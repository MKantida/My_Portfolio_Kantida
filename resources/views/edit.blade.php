@extends('layout')

@section('title', 'แก้ไขข้อมูล')



@section('content')
<h2>หน้าแก้ไขข้อมูลระบบต่างๆ</h2>
<div class="button-container">
    <a href="{{ url('/edit-personal') }}">
        <img src="{{ asset('image/ข้อมูลส่วนบุคคล.png') }}" alt="Paris" class="button-image">
    </a>
    <a href="{{ url('/edit-project') }}">
        <img src="{{ asset('image/รายละเอียดโปรเจค.png') }}" alt="Paris" class="button-image">
    </a>
</div>


@endsection