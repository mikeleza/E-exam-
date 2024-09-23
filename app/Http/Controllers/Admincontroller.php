<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admincontroller extends Controller
{

    public function about($id)
    {
        $user = DB::table('user_info')->where('id', $id)->first();
        $physicalTest = DB::table('physical_tests')->where('user_id', $id)->first();
        $theoreticalTest = DB::table('theoretical_tests')->where('user_id', $id)->first();
        $practicalTest = DB::table('practical_tests')->where('user_id', $id)->first();

        return view('about', compact('user', 'physicalTest', 'theoreticalTest', 'practicalTest'));
    }


    public function blog()
    {
        $users = DB::table('user_info')
            ->leftJoin('physical_tests', 'user_info.id', '=', 'physical_tests.user_id')
            ->leftJoin('theoretical_tests', 'user_info.id', '=', 'theoretical_tests.user_id')
            ->leftJoin('practical_tests', 'user_info.id', '=', 'practical_tests.user_id')
            ->select(
                'user_info.*',
                'physical_tests.status as physical_test_status',
                'theoretical_tests.status as theoretical_test_status',
                'practical_tests.status as practical_test_status'
            )
            ->paginate(5); // สำหรับตารางผู้ใช้

        // คิวรีเพื่อให้แสดงเพียง 5 วันล่าสุด
        $testResults = DB::table('user_info')
            ->leftJoin('physical_tests', 'user_info.id', '=', 'physical_tests.user_id')
            ->leftJoin('theoretical_tests', 'user_info.id', '=', 'theoretical_tests.user_id')
            ->leftJoin('practical_tests', 'user_info.id', '=', 'practical_tests.user_id')
            ->select(
                DB::raw('DATE(user_info.created_at) as test_date'),
                DB::raw('SUM(CASE WHEN physical_tests.status = "ผ่าน" THEN 1 ELSE 0 END) as passed_physical'),
                DB::raw('SUM(CASE WHEN theoretical_tests.status = "ผ่าน" THEN 1 ELSE 0 END) as passed_theoretical'),
                DB::raw('SUM(CASE WHEN practical_tests.status = "ผ่าน" THEN 1 ELSE 0 END) as passed_practical'),
                DB::raw('SUM(CASE WHEN physical_tests.status = "ไม่ผ่าน" THEN 1 ELSE 0 END) as failed_physical'),
                DB::raw('SUM(CASE WHEN theoretical_tests.status = "ไม่ผ่าน" THEN 1 ELSE 0 END) as failed_theoretical'),
                DB::raw('SUM(CASE WHEN practical_tests.status = "ไม่ผ่าน" THEN 1 ELSE 0 END) as failed_practical')
            )
            ->groupBy('test_date')
            ->orderBy('test_date', 'desc') // จัดเรียงจากวันที่ล่าสุด
            ->take(5) // จำกัดแค่ 5 วัน
            ->get(); // ใช้ get() แทน paginate()

        return view('blog', compact('users', 'testResults'));
    }



    function create()
    {
        return view('form');
    }

    function insert(Request $request)
    {
        // Validate the input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'color_blindness' => 'required|string',
            'long_sightedness' => 'required|string',
            'astigmatism' => 'required|string',
            'response_test' => 'required|string',
            'traffic_sign_score' => 'required|integer|between:0,50',
            'traffic_line_score' => 'required|integer|between:0,50',
            'right_of_way_score' => 'required|integer|between:0,50',
            'practical_test' => 'required|string',
        ]);

        // Calculate overall status for physical test
        $passedCount = 0;
        if ($request->color_blindness == 'ผ่าน') $passedCount++;
        if ($request->long_sightedness == 'ผ่าน') $passedCount++;
        if ($request->astigmatism == 'ผ่าน') $passedCount++;
        if ($request->response_test == 'ผ่าน') $passedCount++;

        $physicalStatus = $passedCount >= 3 ? 'ผ่าน' : 'ไม่ผ่าน';

        // Calculate total score for theoretical test
        $totalScore = $request->traffic_sign_score + $request->traffic_line_score + $request->right_of_way_score;
        $theoreticalStatus = $totalScore > 80 ? 'ผ่าน' : 'ไม่ผ่าน';

        // Insert data into user_info
        $userId = DB::table('user_info')->insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data into physical_tests
        DB::table('physical_tests')->insert([
            'user_id' => $userId,
            'color_blindness_test' => $request->color_blindness == 'ผ่าน' ? 1 : 0,
            'long_sightedness_test' => $request->long_sightedness == 'ผ่าน' ? 1 : 0,
            'astigmatism_test' => $request->astigmatism == 'ผ่าน' ? 1 : 0,
            'response_test' => $request->response_test == 'ผ่าน' ? 1 : 0,
            'status' => $physicalStatus,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data into theoretical_tests
        DB::table('theoretical_tests')->insert([
            'user_id' => $userId,
            'traffic_sign_score' => $request->traffic_sign_score,
            'traffic_line_score' => $request->traffic_line_score,
            'right_of_way_score' => $request->right_of_way_score,
            'total_score' => $totalScore, // ถ้าคุณมีฟิลด์นี้ในฐานข้อมูล
            'status' => $theoreticalStatus,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data into practical_tests
        DB::table('practical_tests')->insert([
            'user_id' => $userId,
            'status' => $request->practical_test,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/blog')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    function delete($id)
    {
        // ลบข้อมูลจากตารางที่เกี่ยวข้อง
        DB::table('physical_tests')->where('user_id', $id)->delete();
        DB::table('theoretical_tests')->where('user_id', $id)->delete();
        DB::table('practical_tests')->where('user_id', $id)->delete();

        // ลบข้อมูลจาก user_info
        DB::table('user_info')->where('id', $id)->delete();

        // Redirect กลับไปที่หน้า blog พร้อมข้อความแจ้งเตือน
        return redirect('/blog')->with('success', 'ลบผู้ใช้งานและข้อมูลที่เกี่ยวข้องเรียบร้อยแล้ว');
    }


    function change($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $data = [
            'status' => !$blog->status
        ];
        DB::table('blogs')->where('id', $id)->update($data);
        return redirect('/blog');
    }

    public function update($id)
    {
        // ดึงข้อมูลจาก user_info
        $user = DB::table('user_info')->where('id', $id)->first();

        // ดึงข้อมูลการทดสอบทางกายภาพ
        $physicalTests = DB::table('physical_tests')->where('user_id', $id)->first();

        // ดึงข้อมูลการทดสอบทางทฤษฎี
        $theoreticalTests = DB::table('theoretical_tests')->where('user_id', $id)->first();

        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // ส่งข้อมูลไปยังวิว update
        return view('update', compact('user', 'physicalTests', 'theoreticalTests'));
    }

    public function updates(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'traffic_sign_score' => 'required|numeric|min:0|max:50',
            'traffic_line_score' => 'required|numeric|min:0|max:50',
            'right_of_way_score' => 'required|numeric|min:0|max:50',
            // เพิ่มการตรวจสอบสำหรับ Physical Tests
        ]);

        // Update user information
        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];
        DB::table('user_info')->where('id', $id)->update($userData);

        // Update physical tests
        $physicalData = [
            'color_blindness_test' => $request->color_blindness_test,
            'long_sightedness_test' => $request->long_sightedness_test,
            'astigmatism_test' => $request->astigmatism_test,
            'response_test' => $request->response_test,
            'status' => $this->determinePhysicalStatus($request),
        ];
        DB::table('physical_tests')->where('user_id', $id)->update($physicalData);

        // Update theoretical tests
        $totalScore = $request->traffic_sign_score + $request->traffic_line_score + $request->right_of_way_score;
        $theoreticalStatus = $totalScore > 80 ? 'ผ่าน' : 'ไม่ผ่าน';

        $theoreticalData = [
            'traffic_sign_score' => $request->traffic_sign_score,
            'traffic_line_score' => $request->traffic_line_score,
            'right_of_way_score' => $request->right_of_way_score,
            'total_score' => $totalScore, // เพิ่มการอัปเดตคะแนนรวม
            'status' => $theoreticalStatus,
            'updated_at' => now(), // เพิ่มการอัปเดตเวลา
        ];

        // ทำการอัปเดตข้อมูลในตาราง theoretical_tests
        DB::table('theoretical_tests')->where('user_id', $id)->update($theoreticalData);


        // Update practical tests
        DB::table('practical_tests')->where('user_id', $id)->update([
            'status' => $request->practical_test == 1 ? 'ผ่าน' : 'ไม่ผ่าน',
            'updated_at' => now(),
        ]);



        return redirect('/blog');
    }

    // ฟังก์ชันช่วยในการกำหนดสถานะของการทดสอบร่างกาย
    private function determinePhysicalStatus(Request $request)
    {
        $passedTests = 0;
        if ($request->color_blindness_test == 1) $passedTests++;
        if ($request->long_sightedness_test == 1) $passedTests++;
        if ($request->astigmatism_test == 1) $passedTests++;
        if ($request->response_test == 1) $passedTests++;

        return $passedTests >= 3 ? 'ผ่าน' : 'ไม่ผ่าน';
    }
}
