@extends('layout')

@section('title', 'Update')

@section('content')
    <h2 class="text text-center py-2">แก้ไขข้อมูล</h2>
    <form method="POST" action="{{ route('updates', $user->id) }}">
        @csrf

        <div class="form-group">
            <label for="first_name">ชื่อ</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
        </div>

        @error('first_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="last_name">นามสกุล</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>

        @error('last_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <hr>

        <h4>ทดสอบร่างการ</h4>
        <div class="form-group">
            <label>ทดสอบตาบอดสี</label><br>
            <input type="radio" name="color_blindness_test" value="1" {{ $physicalTests->color_blindness_test ? 'checked' : '' }}> ผ่าน
            <input type="radio" name="color_blindness_test" value="0" {{ !$physicalTests->color_blindness_test ? 'checked' : '' }}> ไม่ผ่าน
        </div>

        <div class="form-group">
            <label>ทดสอบสายตายาว</label><br>
            <input type="radio" name="long_sightedness_test" value="1" {{ $physicalTests->long_sightedness_test ? 'checked' : '' }}> ผ่าน
            <input type="radio" name="long_sightedness_test" value="0" {{ !$physicalTests->long_sightedness_test ? 'checked' : '' }}> ไม่ผ่าน
        </div>

        <div class="form-group">
            <label>ทดสอบสายตาเอียง</label><br>
            <input type="radio" name="astigmatism_test" value="1" {{ $physicalTests->astigmatism_test ? 'checked' : '' }}> ผ่าน
            <input type="radio" name="astigmatism_test" value="0" {{ !$physicalTests->astigmatism_test ? 'checked' : '' }}> ไม่ผ่าน
        </div>

        <div class="form-group">
            <label>ทดสอบการตอบสนองของร่างการ</label><br>
            <input type="radio" name="response_test" value="1" {{ $physicalTests->response_test ? 'checked' : '' }}> ผ่าน
            <input type="radio" name="response_test" value="0" {{ !$physicalTests->response_test ? 'checked' : '' }}> ไม่ผ่าน
        </div>

        <hr>

        <h4>การสอบภาคปฏิบัติ</h4>
        <div class="form-group">
            <label>ผลการทดสอบ</label><br>
            <input type="radio" name="practical_test" value="1" {{ $theoreticalTests->status == 'ผ่าน' ? 'checked' : '' }}> ผ่าน
            <input type="radio" name="practical_test" value="0" {{ $theoreticalTests->status == 'ไม่ผ่าน' ? 'checked' : '' }}> ไม่ผ่าน
        </div>

        <hr>

        <h4>ทดสอบภาคทฤษฏี</h4>
        <div class="form-group">
            <label>ป้ายจราจร</label>
            <input type="number" name="traffic_sign_score" class="form-control" value="{{ $theoreticalTests->traffic_sign_score }}">
        </div>

        <div class="form-group">
            <label>เส้นจราจร</label>
            <input type="number" name="traffic_line_score" class="form-control" value="{{ $theoreticalTests->traffic_line_score }}">
        </div>

        <div class="form-group">
            <label>การให้ทาง</label>
            <input type="number" name="right_of_way_score" class="form-control" value="{{ $theoreticalTests->right_of_way_score }}">
        </div>

        <input type="submit" value="แก้ไข" class="btn btn-success my-2">
    </form>
@endsection
