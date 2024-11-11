@extends('layout')

@section('title', 'แก้ไขข้อมูล')

@section('menu')
@parent
<a href="{{ url('/edit') }}" class="menu">
    <i class="fa-solid fa-pen-to-square"></i>
    <b> แก้ไขข้อมูล</b>ระบบต่างๆ</a>

<a href="{{ url('/edit-personal') }}" class="menu">
    <i class="fa-solid fa-address-card"></i>
    <b>แก้ไขข้อมูล</b>ส่วนบุคคล</a>

<a href="{{ url('/edit-educational') }}" class="menu">
    <i class="fa-solid fa-graduation-cap"></i>
    <b>แก้ไขข้อมูล</b>การศึกษา</a>

<a href="{{ url('/edit-company') }}" class="menu">
    <i class="fa-solid fa-briefcase"></i>
    <b>แก้ไขข้อมูล</b>การทำงาน</a>

@endsection

@section('content')
<h2>แก้ไขข้อมูลการศึกษา</h2>

<form action="{{ route('educational.update', $school->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-inline">
        <div class="full-width">
            <label class="label" for="schoolname">โรงเรียน:</label>
            <input type="text" id="schoolname" name="schoolname" placeholder="Enter school name" value="{{ old('schoolname', $school->schoolname) }}">
        </div>
        <div class="less-width">
            <label class="label" for="program">สายการเรียน:</label>
            <input type="text" id="program" name="program" placeholder="Enter program" value="{{ old('program', $school->program) }}">
        </div>
        <div class="less-width">
            <label class="label" for="grade">เกรดเฉลี่ย:</label>
            <input type="text" id="grade" name="grade" placeholder="Enter grade" value="{{ old('grade', $school->grade) }}">
        </div>
    </div>
    <hr>

    <div class="form-container">
        @foreach($universities as $index => $university)
        <div class="form-inline">
            <input type="hidden" name="universities[{{ $index }}][university_id]" value="{{ $university->university_id }}"> <!-- เพิ่ม input สำหรับ university_id -->

            <div class="form-header">
                <button type="button" class="add" onclick="addForm()"> <i class="fa-solid fa-plus"></i> </button>
                @if ($index > 0) <!-- แสดงปุ่มลบเฉพาะฟอร์มที่ 2 เป็นต้นไป -->
                <button type="button" class="delete" onclick="deleteForm(this)"> <i class="fa-solid fa-minus"></i></button>
                @endif
            </div>


            <div class="full-width">
                <label class="label" for="universityname_{{ $index }}">ชื่อมหาวิทยาลัย:</label>
                <input type="text" id="universityname_{{ $index }}" name="universities[{{ $index }}][universityname]" value="{{ old('universities.'.$index.'.universityname', $university->universityname) }}">
            </div>
            <div class="less-width">
                <label class="label" for="level_{{ $index }}">ระดับการศึกษา:</label>
                <input type="text" id="level_{{ $index }}" name="universities[{{ $index }}][level]" value="{{ old('universities.'.$index.'.level', $university->level) }}">
            </div>
            <div class="less-width">
                <label class="label" for="degree_{{ $index }}">ชื่อปริญญา:</label>
                <input type="text" id="degree_{{ $index }}" name="universities[{{ $index }}][degree]" value="{{ old('universities.'.$index.'.degree', $university->degree) }}">
            </div>
            <div class="less-width">
                <label class="label" for="faculty_{{ $index }}">คณะ:</label>
                <input type="text" id="faculty_{{ $index }}" name="universities[{{ $index }}][faculty]" value="{{ old('universities.'.$index.'.faculty', $university->faculty) }}">
            </div>
            <div class="less-width">
                <label class="label" for="major_{{ $index }}">สาขา:</label>
                <input type="text" id="major_{{ $index }}" name="universities[{{ $index }}][major]" value="{{ old('universities.'.$index.'.major', $university->major) }}">
            </div>
            <div class="less-width">
                <label class="label" for="gpa_{{ $index }}">คะแนนเฉลี่ยสะสม:</label>
                <input type="text" id="gpa_{{ $index }}" name="universities[{{ $index }}][gpa]" value="{{ old('universities.'.$index.'.gpa', $university->gpa) }}">
            </div>
            <div class="less-width"></div>

        </div>
        <hr>
        @endforeach
    </div>



    <div class="button-container">
        <button type="submit" class="save fa-regular fa-floppy-disk"> บันทึก</button>
        <button type="button" class="cancel"> ยกเลิก</button>
    </div>

    <script>
        function addForm() {
            const formContainer = document.querySelector('.form-container');
            const universityCount = formContainer.querySelectorAll('.form-inline').length; // นับจำนวนฟอร์มที่มีอยู่แล้ว

            const newFormContainer = document.createElement('div');
            newFormContainer.className = 'form-inline';

            newFormContainer.innerHTML = `
        <div class="form-header">
            <button type="button" class="add" onclick="addForm()"> <i class="fa-solid fa-plus"></i></button>
            <button type="button" class="delete" onclick="deleteForm(this)"> <i class="fa-solid fa-minus"></i></button>
        </div>

        <div class="full-width">
            <label class="label" for="universityname_${universityCount}">ชื่อมหาวิทยาลัย:</label>
            <input type="text" name="universities[${universityCount}][universityname]" placeholder="ชื่อมหาวิทยาลัย" required>
        </div>

        <div class="less-width">
            <label class="label" for="level_${universityCount}">ระดับการศึกษา:</label>
            <input type="text" name="universities[${universityCount}][level]" placeholder="ระดับการศึกษา" required>
        </div>

        <div class="less-width">
            <label class="label" for="degree_${universityCount}">ชื่อปริญญา:</label>
            <input type="text" name="universities[${universityCount}][degree]" placeholder="ชื่อปริญญา" required>
        </div>

        <div class="less-width">
            <label class="label" for="faculty_${universityCount}">คณะ:</label>
            <input type="text" name="universities[${universityCount}][faculty]" placeholder="คณะ" required>
        </div>

        <div class="less-width">
            <label class="label" for="major_${universityCount}">สาขา:</label>
            <input type="text" name="universities[${universityCount}][major]" placeholder="สาขา" required>
        </div>

        <div class="less-width">
            <label class="label" for="gpa_${universityCount}">คะแนนเฉลี่ยสะสม:</label>
            <input type="text" name="universities[${universityCount}][gpa]" placeholder="คะแนนเฉลี่ยสะสม" required>
        </div>
        <div class="less-width"></div>
    `;

            const newHr = document.createElement('hr');

            formContainer.appendChild(newFormContainer);
            formContainer.appendChild(newHr);
        }


        function deleteForm(button) {
            const form = button.closest('.form-inline');
            const hr = form.nextElementSibling; // หาค่า <hr> ถัดไป
            const universityIdInput = form.querySelector('input[name$="[university_id]"]');
            const universityId = universityIdInput ? universityIdInput.value : null; // ดึง university_id

            if (confirm("คุณแน่ใจหรือว่าต้องการลบมหาวิทยาลัยนี้?")) {
                // ถ้า universityId ไม่มี หมายถึงเป็นฟอร์มใหม่
                if (!universityId) {
                    // ลบแบบฟอร์มจาก DOM
                    form.remove();
                    if (hr && hr.tagName === 'HR') {
                        hr.remove(); // ลบ <hr> ถ้าพบ
                    }
                    return; // ออกจากฟังก์ชัน
                }

                // ส่งคำขอลบไปยังเซิร์ฟเวอร์
                fetch(`/delete-educational/${universityId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // ใส่ CSRF token
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // ลบแบบฟอร์มจาก DOM
                            form.remove();
                            if (hr && hr.tagName === 'HR') {
                                hr.remove(); // ลบ <hr> ถ้าพบ
                            }
                            // แสดงข้อความยืนยันการลบ
                            alert(data.success);
                        } else {
                            alert(data.error); // แสดงข้อความผิดพลาด
                        }
                    })
                    .catch(error => {
                        alert('เกิดข้อผิดพลาดในการลบข้อมูล: ' + error.message);
                    });
            }
        }
    </script>



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