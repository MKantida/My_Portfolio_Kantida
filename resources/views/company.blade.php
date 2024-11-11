@extends('layout')

@section('title', 'ผลงาน')

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

<h2>ข้อมูลการทำงาน</h2>


<div id="form-container">

    @if($company->isEmpty())
    <p>ไม่มีข้อมูลทำงานในระบบ</p>
    @else

    @foreach($company as $company)
    <div class="form-inline">

        <div class="full-width">
            <label class="label" for="company">ชื่อบริษัท:</label>
            <input type="text" id="company" name="company" value="{{ $company->company }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="position">ตำแหน่ง:</label>
            <input type="text" id="position" name="position" value="{{ $company->position }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="salary">อัตราเงินเดือน:</label>
            <input type="text" id="salary" name="salary" value="{{ $company->salary }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="startday">วันที่เริ่มงาน:</label>
            <input type="date" id="startday" name="startday" value="{{ $company->startday }}" readonly>
        </div>
        <div class="less-width">
            <label class="label" for="endday">วันที่ออกจากงาน:</label>
            <input type="date" id="endday" name="endday" value="{{ $company->endday }}" readonly>
        </div>
        <div class="full-area">
            <label class="label" for="details">รายละเอียดงาน:</label>
            <textarea id="details" name="details" readonly>{{ $company->details }}></textarea>
        </div>
    </div>
    <hr>
</div>


@endforeach
@endif
@endsection