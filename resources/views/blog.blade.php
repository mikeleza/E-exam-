@extends('layout')

@section('title', 'User List')

@section('content')

    <h1 class="text text-center py-2">รายชื่อผู้เข้ารับการทดสอบ</h1>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col" width="20%">ชื่อ</th>
                <th scope="col">การทดสอบร่างกาย</th>
                <th scope="col">การทดสอบภาคทฤษฏี</th>
                <th scope="col">การสอบภาคปฏิบัติ</th>
                <th scope="col">ขอใบอนุญาตขับขี่</th>
                <th scope="col" width="10%">ลบ</th>
                <th scope="col" width="10%">แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row" class="text-start">
                        <a href="{{ route('about', $user->id) }}" style="color: black; text-decoration: none;">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </a>
                    </th>

                    <td>
                        <span class="badge {{ $user->physical_test_status == 'ผ่าน' ? 'bg-success' : 'bg-danger' }} fs-6">
                            {{ $user->physical_test_status }}
                        </span>
                    </td>

                    <td>
                        <span class="badge {{ $user->theoretical_test_status == 'ผ่าน' ? 'bg-success' : 'bg-danger' }} fs-6">
                            {{ $user->theoretical_test_status }}
                        </span>
                    </td>

                    <td>
                        <span class="badge {{ $user->practical_test_status == 'ผ่าน' ? 'bg-success' : 'bg-danger' }} fs-6">
                            {{ $user->practical_test_status }}
                        </span>
                    </td>

                    <td>
                        @php
                            $licenseStatus = '';
                            if ($user->physical_test_status == 'ผ่าน' && $user->theoretical_test_status == 'ผ่าน' && $user->practical_test_status == 'ผ่าน') {
                                $licenseStatus = 'ผ่านการทดสอบ';
                            } elseif ($user->physical_test_status == 'ไม่ผ่าน' || $user->theoretical_test_status == 'ไม่ผ่าน' || $user->practical_test_status == 'ไม่ผ่าน') {
                                $licenseStatus = 'ไม่ผ่านการทดสอบ';
                            } else {
                                $licenseStatus = 'รอพิจารณา';
                            }
                        @endphp
                        <span class="badge {{ $licenseStatus == 'ผ่านการทดสอบ' ? 'bg-success' : ($licenseStatus == 'ไม่ผ่านการทดสอบ' ? 'bg-danger' : 'bg-warning') }} fs-6">
                            {{ $licenseStatus }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('delete', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure?')">ลบ</a>
                    </td>
                    <td>
                        <a href="{{ route('update', $user->id) }}" class="btn btn-primary">แก้ไข</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

    <h3 class="text-center my-4">สรุปผลการทดสอบ</h3>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">วันที่</th>
                <th scope="col">ผ่านการทดสอบ (ร่างกาย)</th>
                <th scope="col">ผ่านการทดสอบ (ภาคทฤษฏี)</th>
                <th scope="col">ผ่านการสอบ (ภาคปฏิบัติ)</th>
                <th scope="col">ไม่ผ่านการทดสอบ (ร่างกาย)</th>
                <th scope="col">ไม่ผ่านการทดสอบ (ภาคทฤษฏี)</th>
                <th scope="col">ไม่ผ่านการสอบ (ภาคปฏิบัติ)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testResults as $result)
                <tr>
                    <td>{{ $result->test_date }}</td>
                    <td>{{ $result->passed_physical }}</td>
                    <td>{{ $result->passed_theoretical }}</td>
                    <td>{{ $result->passed_practical }}</td>
                    <td>{{ $result->failed_physical }}</td>
                    <td>{{ $result->failed_theoretical }}</td>
                    <td>{{ $result->failed_practical }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
