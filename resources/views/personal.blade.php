@extends('layout')
@section('title', 'ข้อมูลส่วนตัว')

@section('menu')
@parent
<a href="{{ url('/personal') }}" class="menu">
    <i class="fa-solid fa-address-card"></i>
    ข้อมูลส่วนบุคคล</a>
<a href="{{ url('/educational') }}" class="menu">
    <i class="fa-solid fa-graduation-cap"></i>
    ข้อมูลการศึกษา</a>
<a href="{{ url('/company') }}" class="menu">
    <i class="fa-solid fa-briefcase"></i>
    ข้อมูลการทำงาน</a>
@endsection

@section('content')
<h2>ข้อมูลส่วนตัว</h2>

@if($personal->isEmpty())
<p>ไม่มีข้อมูลในระบบ</p>
@else


@foreach($personal as $person)
<div class="form-profile">
    <label for="file">
        @if(isset($person->image) && $person->image->image_path)
        <img src="{{ asset('storage/' . $person->image->image_path) }}" alt="Profile Image" class="profile">
        @else
        <p>ไม่มีภาพโปรไฟล์</p> <!-- แสดงข้อความแทน -->
        @endif
    </label>
</div>
@endforeach

@foreach($personal as $person)
<div class="form-inline">
    <div class="less-width">
        <label class="label" for="firstname">ชื่อ:</label>
        <input type="text" id="firstname" name="firstname" value="{{ $person->firstname }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="lastname">นามสกุล:</label>
        <input type="text" id="lastname" name="lastname" value="{{ $person->lastname }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="nickname">ชื่อเล่น:</label>
        <input type="text" id="nickname" name="nickname" value="{{ $person->nickname }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="birthday">วันเกิด:</label>
        <input type="date" id="birthday" name="birthday" value="{{ $person->birthday }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="phone">โทรศัทพ์มือถือ:</label>
        <input type="text" id="phone" name="phone" value="{{ $person->phone }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="email">อีเมล:</label>
        <input type="email" id="email" name="email" value="{{ $person->email }}" readonly>
    </div>
</div>
<hr>

<h2>ที่อยู่ที่สามารถติดต่อได้</h2>

@if($person->address)
<div class="form-inline">
    <div class="less-width">
        <label class="label" for="number">บ้านเลขที่:</label>
        <input type="text" id="number" name="number" value="{{ $person->address->number }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="village">หมู่บ้าน/อาคาร:</label>
        <input type="text" id="village" name="village" value="{{ $person->address->village }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="moo">หมู่:</label>
        <input type="text" id="moo" name="moo" value="{{ $person->address->moo }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="soi">ตรอก/ซอย:</label>
        <input type="text" id="soi" name="soi" value="{{ $person->address->soi }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="road">ถนน:</label>
        <input type="text" id="road" name="road" value="{{ $person->address->road }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="tambon">ตำบล/แขวง:</label>
        <input type="text" id="tambon" name="tambon" value="{{ $person->address->tambon }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="amphoe">อำเภอ/เขต:</label>
        <input type="text" id="amphoe" name="amphoe" value="{{ $person->address->amphoe }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="province">จังหวัด:</label>
        <input type="text" id="province" name="province" value="{{ $person->address->province }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="code">รหัสไปรษณีย์:</label>
        <input type="text" id="code" name="code" value="{{ $person->address->code }}" readonly>
    </div>
    <div class="less-width"></div>
</div>
@endif


@endforeach
@endif
@endsection