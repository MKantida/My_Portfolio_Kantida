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
<h2>ข้อมูลการศึกษา</h2>
@if($schools->count() == 0)
<p>ไม่มีข้อมูลในระบบ</p>
@else
@foreach($schools as $school)
<div class="form-inline">
    <div class="full-width">
        <label class="label" for="schoolname">มัธยมปลาย:</label>
        <input type="text" id="schoolname" name="schoolname" value="{{ $school->schoolname }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="program">สายการเรียน:</label>
        <input type="text" id="program" name="program" value="{{ $school->program }}" readonly>
    </div>
    <div class="less-width">
        <label class="label" for="grade">เกรดเฉลี่ย:</label>
        <input type="text" id="grade" name="grade" value="{{ $school->grade }}" readonly>
    </div>
</div>
<hr>

@if($school->universities->isNotEmpty())
@foreach($school->universities as $university)
<div id="form-container">
    <div class="form-inline">
        <div class="full-width">
            <label class="label" for="universityname">มหาวิทยาลัย:</label>
            <input type="text" id="universityname" name="universityname" value="{{ $university->universityname }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="level">ระดับการศึกษา:</label>
            <input type="text" id="level" name="level" value="{{ $university->level }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="degree">ชื่อปริญญา:</label>
            <input type="text" id="degree" name="degree" value="{{ $university->degree }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="faculty">คณะ:</label>
            <input type="text" id="faculty" name="faculty" value="{{ $university->faculty }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="major">สาขา:</label>
            <input type="text" id="major" name="major" value="{{ $university->major }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="gpa">คะแนนเฉลี่ยสะสม:</label>
            <input type="text" id="gpa" name="gpa" value="{{ $university->gpa }}" readonly>
        </div>
        <div class="less-width"></div>
    </div>
    <hr>
</div>
@endforeach
@endif
@endforeach
@endif
@endsection