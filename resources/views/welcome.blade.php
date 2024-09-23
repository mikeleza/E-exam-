@extends('layout')

@section('title')
    E-exam
@endsection

@section('content')

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="display-4">ระบบบันทึกผลการทดสอบขอใบอนุญาตขับขี่</h1>
            <h2>พัฒนาโดย</h2>
            <h3>นาย พงศธร บางเหลือง</h3>
            <a href="{{ route('blog') }}" class="btn btn-primary mt-4">เข้าใช้งาน</a>
        </div>
    </div>

@endsection
