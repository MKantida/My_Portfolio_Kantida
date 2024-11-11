@extends('layout')

@section('title', 'หน้าแรก')

@section('menu')
@parent
<a href="{{ url('/edit') }}" class="menu">
    <i class="fa-solid fa-pen-to-square"></i>
    แก้ไขข้อมูล</a>


@endsection

@section('content')
<h1>หน้าแรกค่ะ</h1>
<div class="button-container">
    <a href="{{ url('/personal') }}">
        <img src="{{ asset('image/ข้อมูลส่วนบุคคล.png') }}" alt="Paris" class="button-image">
    </a>
    <a href="{{ url('/project') }}">
        <img src="{{ asset('image/รายละเอียดโปรเจค.png') }}" alt="Paris" class="button-image">
    </a>
</div>
@endsection