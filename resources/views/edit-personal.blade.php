@extends('layout')

@section('title', 'แก้ไขข้อมูล')

@section('menu')
@parent
<a href="{{ url('/edit') }}" class="menu">
    <i class="fa-solid fa-pen-to-square"></i>
    <B> แก้ไขข้อมูล</B>ระบบต่างๆ</a>

<a href="{{ url('/edit-personal') }}" class="menu">
    <i class="fa-solid fa-address-card"></i>
    <B>แก้ไขข้อมูล</B>ส่วนบุคคล</a>

<a href="{{ url('/edit-educational') }}" class="menu">
    <i class="fa-solid fa-graduation-cap"></i>
    <B>แก้ไขข้อมูล</B>การศึกษา</a>

<a href="{{ url('/edit-company') }}" class="menu">
    <i class="fa-solid fa-briefcase"></i>
    <B>แก้ไขข้อมูล</B>การทำงาน</a>
@endsection

@section('content')
<h2>แก้ไขข้อมูลส่วนบุคคล</h2>

<div class="form-profile">
    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-profile">
            <label for="file">
                @if(isset($personal->image)) <!-- ตรวจสอบว่ามีภาพหรือไม่ -->
                <img src="{{ Storage::url($personal->image->image_path) }}" alt="Profile Image" class="profile">
                <!-- แสดงภาพโปรไฟล์ -->
                @else
                <img src="{{ asset('image/ดาวน์โหลด.jpg') }}" alt="Default Image" class="profile"> <!-- แสดงภาพดีฟอลต์ -->
                @endif
            </label>
            <div class="form-file">
                <input type="hidden" name="person_id" value="{{ $personal->person_id }}">
                <input type="file" name="image" id="image" class="file-profile">
                <button class="file-button" type="submit"> <i class="fa-solid fa-file-import"></i>อัปโหลด</button>
            </div>
        </div>
    </form>
</div>


<form action="{{ route('personal.update', $personal->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-inline">
        <div class="less-width">
            <label class="label" for="firstname">ชื่อ:</label>
            <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $personal->firstname) }}">
        </div>
        <div class="less-width">
            <label class="label" for="lastname">นามสกุล:</label>
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $personal->lastname) }}">
        </div>
        <div class="less-width">
            <label class="label" for="nickname">ชื่อเล่น:</label>
            <input type="text" id="nickname" name="nickname" value="{{ old('nickname', $personal->nickname) }}">
        </div>
        <div class="less-width">
            <label class="label" for="birthday">วันเกิด:</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $personal->birthday) }}">
        </div>
        <div class="less-width">
            <label class="label" for="phone">โทรศัพท์มือถือ:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $personal->phone) }}">
        </div>
        <div class="less-width">
            <label class="label" for="email">อีเมล:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $personal->email) }}">
        </div>
    </div>

    <hr>

    <h2>ที่อยู่ที่สามารถติดต่อได้</h2>
    <div class="form-inline">
        <div class="less-width">
            <label class="label" for="number">บ้านเลขที่:</label>
            <input type="text" id="number" name="number" value="{{ old('number', $personal->address->number) }}">
        </div>
        <div class="less-width">
            <label class="label" for="village">หมู่บ้าน/อาคาร:</label>
            <input type="text" id="village" name="village" value="{{ old('village', $personal->address->village) }}">
        </div>
        <div class="less-width">
            <label class="label" for="moo">หมู่:</label>
            <input type="text" id="moo" name="moo" value="{{ old('moo', $personal->address->moo) }}">
        </div>
        <div class="less-width">
            <label class="label" for="soi">ตรอก/ซอย:</label>
            <input type="text" id="soi" name="soi" value="{{ old('soi', $personal->address->soi) }}">
        </div>
        <div class="less-width">
            <label class="label" for="road">ถนน:</label>
            <input type="text" id="road" name="road" value="{{ old('road', $personal->address->road) }}">
        </div>
        <div class="less-width">
            <label class="label" for="tambon">ตำบล/แขวง:</label>
            <input type="text" id="tambon" name="tambon" value="{{ old('tambon', $personal->address->tambon) }}">
        </div>
        <div class="less-width">
            <label class="label" for="amphoe">อำเภอ/เขต:</label>
            <input type="text" id="amphoe" name="amphoe" value="{{ old('amphoe', $personal->address->amphoe) }}">
        </div>
        <div class="less-width">
            <label class="label" for="province">จังหวัด:</label>
            <input type="text" id="province" name="province" value="{{ old('province', $personal->address->province) }}">
        </div>
        <div class="less-width">
            <label class="label" for="code">รหัสไปรษณีย์:</label>
            <input type="text" id="code" name="code" value="{{ old('code', $personal->address->code) }}">
        </div>
        <div class="less-width"></div>
    </div>


    <div class="button-container">
        <button type="submit" class="save  fa-regular fa-floppy-disk"> บันทึก</button>

        <button type="submit" class="cancel "> ยกเลิก</button>
    </div>
</form>

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@endsection