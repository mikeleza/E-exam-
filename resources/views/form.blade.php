@extends('layout')

@section('title', 'Form')

@section('content')
    <h2 class="text text-center py-2">สร้างรายชื่อและคะแนน</h2>
    <form method="POST" action="/insert">
        @csrf

        <div class="form-row mb-3">
            <div class="col">
                <label for="first_name">ชื่อ</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="col">
                <label for="last_name">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>

        <hr>

        <h4>ทดสอบร่างกาย</h4>
        <div class="form-group">
            <label>ทดสอบตาบอดสี</label><br>
            <label><input type="radio" name="color_blindness" value="ผ่าน" required> ผ่าน</label>
            <label><input type="radio" name="color_blindness" value="ไม่ผ่าน"> ไม่ผ่าน</label>
        </div>

        <div class="form-group">
            <label>ทดสอบสายตายาว</label><br>
            <label><input type="radio" name="long_sightedness" value="ผ่าน" required> ผ่าน</label>
            <label><input type="radio" name="long_sightedness" value="ไม่ผ่าน"> ไม่ผ่าน</label>
        </div>

        <div class="form-group">
            <label>ทดสอบสายตาเอียง</label><br>
            <label><input type="radio" name="astigmatism" value="ผ่าน" required> ผ่าน</label>
            <label><input type="radio" name="astigmatism" value="ไม่ผ่าน"> ไม่ผ่าน</label>
        </div>

        <div class="form-group">
            <label>ทดสอบการตอบสนองของร่างกาย</label><br>
            <label><input type="radio" name="response_test" value="ผ่าน" required> ผ่าน</label>
            <label><input type="radio" name="response_test" value="ไม่ผ่าน"> ไม่ผ่าน</label>
        </div>

        <hr>

        <h4>ทดสอบภาคทฤษฏี</h4>
        <div class="form-group">
            <label for="traffic_sign_score">ป้ายจราจร</label>
            <input type="number" name="traffic_sign_score" class="form-control" min="0" max="50" required>
        </div>

        <div class="form-group">
            <label for="traffic_line_score">เส้นจราจร</label>
            <input type="number" name="traffic_line_score" class="form-control" min="0" max="50" required>
        </div>

        <div class="form-group">
            <label for="right_of_way_score">การให้ทาง</label>
            <input type="number" name="right_of_way_score" class="form-control" min="0" max="50" required>
        </div>

        <hr>

        <h4>การสอบภาคปฏิบัติ</h4>
        <div class="form-group">
            <label>ผลการทดสอบ</label><br>
            <label><input type="radio" name="practical_test" value="ผ่าน" required> ผ่าน</label>
            <label><input type="radio" name="practical_test" value="ไม่ผ่าน"> ไม่ผ่าน</label>
        </div>

        <input type="submit" value="บันทึก" class="btn btn-success my-2">
    </form>
@endsection
