@extends('layout')

@section('title', 'แก้ไขข้อมูล')

@section('menu')
@parent

<a href="{{ url('/edit-project') }}" class="menu">
    <i class="fa-solid fa-desktop"></i>
    รายละเอียดโปรเจค</a>

@endsection

@section('content')
<h2>ข้อมูลรายละเอียดโปรเจค</h2>

<div id="form-container">

    @if($projects->isEmpty())
    <p>ไม่มีโปรเจคในระบบ</p>
    @else
    <div class="form-container">
        @foreach($projects as $project)

        <div class="form-inline">
            <div class="full-width">
                <label class="label" for="project">ชื่อผลงาน:</label>
                <input type="text" id="project" name="project" placeholder="Enter project" value="{{ $project->project }}" readonly>
            </div>
            <div class="full-width">
                <label class="label" for="tools">เครื่องมือภาษา:</label>
                <input type="text" id="tools" placeholder="Enter tools" value="{{ $project->tools }}" name="tools" readonly>
            </div>
            <div class="full-width">
                <label class="label" for="link">link:</label>
                <input type="text" id="link" placeholder="Enter link" value="{{ $project->link }}" name="link" readonly>
            </div>

        </div>
        <hr>


        @endforeach
        @endif
    </div>
    @endsection