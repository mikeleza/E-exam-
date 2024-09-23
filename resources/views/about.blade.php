@extends('layout')

@section('title', 'User Scores')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-4">คะแนนของ {{ $user->first_name }} {{ $user->last_name }}</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h3>การทดสอบร่างกาย</h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li>
                    <strong>ทดสอบตาบอดสี:</strong> 
                    <span class="{{ $physicalTest->color_blindness_test === 1 ? 'text-success' : ($physicalTest->color_blindness_test === 0 ? 'text-danger' : '') }}">
                        {{ $physicalTest->color_blindness_test === 1 ? 'ผ่าน' : ($physicalTest->color_blindness_test === 0 ? 'ไม่ผ่าน' : 'รอพิจารณา') }}
                    </span>
                </li>
                <li>
                    <strong>ทดสอบสายตายาว:</strong> 
                    <span class="{{ $physicalTest->long_sightedness_test === 1 ? 'text-success' : ($physicalTest->long_sightedness_test === 0 ? 'text-danger' : '') }}">
                        {{ $physicalTest->long_sightedness_test === 1 ? 'ผ่าน' : ($physicalTest->long_sightedness_test === 0 ? 'ไม่ผ่าน' : 'รอพิจารณา') }}
                    </span>
                </li>
                <li>
                    <strong>ทดสอบสายตาเอียง:</strong> 
                    <span class="{{ $physicalTest->astigmatism_test === 1 ? 'text-success' : ($physicalTest->astigmatism_test === 0 ? 'text-danger' : '') }}">
                        {{ $physicalTest->astigmatism_test === 1 ? 'ผ่าน' : ($physicalTest->astigmatism_test === 0 ? 'ไม่ผ่าน' : 'รอพิจารณา') }}
                    </span>
                </li>
                <li>
                    <strong>ทดสอบการตอบสนองของร่างการ:</strong> 
                    <span class="{{ $physicalTest->response_test === 1 ? 'text-success' : ($physicalTest->response_test === 0 ? 'text-danger' : '') }}">
                        {{ $physicalTest->response_test === 1 ? 'ผ่าน' : ($physicalTest->response_test === 0 ? 'ไม่ผ่าน' : 'รอพิจารณา') }}
                    </span>
                </li>
                <li>
                    <strong>สถานะ:</strong> 
                    <span class="{{ $physicalTest->status === 'ผ่าน' ? 'text-success' : ($physicalTest->status === 'ไม่ผ่าน' ? 'text-danger' : '') }}">
                        {{ $physicalTest->status ?? 'รอพิจารณา' }}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3>การทดสอบภาคทฤษฏี</h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li><strong>ป้ายจราจร:</strong> {{ $theoreticalTest->traffic_sign_score ?? 'รอพิจารณา' }}</li>
                <li><strong>เส้นจราจร:</strong> {{ $theoreticalTest->traffic_line_score ?? 'รอพิจารณา' }}</li>
                <li><strong>การให้ทาง:</strong> {{ $theoreticalTest->right_of_way_score ?? 'รอพิจารณา' }}</li>
                <li>
                    <strong>สถานะ:</strong> 
                    <span class="{{ $theoreticalTest->status === 'ผ่าน' ? 'text-success' : ($theoreticalTest->status === 'ไม่ผ่าน' ? 'text-danger' : '') }}">
                        {{ $theoreticalTest->status ?? 'รอพิจารณา' }}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3>การสอบภาคปฏิบัติ</h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li>
                    <strong>สถานะ:</strong> 
                    <span class="{{ $practicalTest->status === 'ผ่าน' ? 'text-success' : ($practicalTest->status === 'ไม่ผ่าน' ? 'text-danger' : '') }}">
                        {{ $practicalTest->status ?? 'รอพิจารณา' }}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('blog') }}" class="btn btn-secondary">กลับไปยังรายชื่อผู้เข้ารับการทดสอบ</a>
    </div>
</div>

@endsection
