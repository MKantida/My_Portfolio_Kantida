@extends('layout')

@section('title', 'แก้ไขข้อมูล')

@section('menu')
@parent
<a href="{{ url('/edit') }}" class="menu">
    <i class="fa-solid fa-pen-to-square"></i>
    <B>แก้ไขข้อมูล</B>ระบบต่างๆ</a>

<a href="{{ url('/edit-project') }}" class="menu">
    <i class="fa-solid fa-desktop"></i>
    <B>แก้ไขข้อมูล</B>รายละเอียดโปรเจค</a>

@endsection

@section('content')
<h2>แก้ไขข้อมูลรายละเอียดโปรเจค</h2>

<div id="form-container">
    <form action="{{ route('projects.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-container">
            @foreach($projects as $index => $project)
            <div class="form-inline">
                <input type="hidden" name="project_id[]" value="{{ $project->project_id }}">

                <div class="form-header">
                    <button type="button" class="add" onclick="addForm()"> <i class="fa-solid fa-plus"></i></button>
                    @if ($index > 0) <!-- แสดงปุ่มลบเฉพาะฟอร์มที่ 2 เป็นต้นไป -->
                    <button type="button" class="delete" onclick="deleteForm(this)"> <i class="fa-solid fa-minus"></i></button>
                    @endif
                </div>

                <div class="full-width">
                    <label class="label" for="project">ชื่อผลงาน:</label>
                    <input type="text" id="project" name="project[]" value="{{ old('project.'.$loop->index, $project->project) }}" placeholder="Enter project">
                </div>

                <div class="full-width">
                    <label class="label" for="tools">เครื่องมือภาษา:</label>
                    <input type="text" id="tools" name="tools[]" value="{{ old('tools.'.$loop->index, $project->tools) }}" placeholder="Enter tools">
                </div>

                <div class="full-width">
                    <label class="label" for="link">link:</label>
                    <input type="text" id="link" name="link[]" value="{{ old('link.'.$loop->index, $project->link) }}" placeholder="Enter link">
                </div>
            </div>
            <hr>
            @endforeach
        </div>




        <script>
            function addForm() {
                // ดึง container ที่มี class="form-container"
                const formContainer = document.querySelector('.form-container');

                const newFormContainer = document.createElement('div');
                newFormContainer.className = 'form-inline';

                newFormContainer.innerHTML = `
            <div class="form-header">
                <button type="button" class="add" onclick="addForm()"> <i class="fa-solid fa-plus"></i></button>
                <button type="button" class="delete" onclick="deleteForm(this)"> <i class="fa-solid fa-minus"></i></button>
            </div>

            <div class="full-width">
                <label class="label" for="project">ชื่อผลงาน:</label>
                <input type="text" name="project[]" placeholder="Enter project">
            </div>

            <div class="full-width">
                <label class="label" for="tools">เครื่องมือภาษา:</label>
                <input type="text" name="tools[]" placeholder="Enter tools">
            </div>

            <div class="full-width">
                <label class="label" for="link">link:</label>
                <input type="text" name="link[]" placeholder="Enter link">
            </div>
        `;

                const newHr = document.createElement('hr');

                // เพิ่มฟอร์มใหม่และ hr ลงใน container
                formContainer.appendChild(newFormContainer);
                formContainer.appendChild(newHr);
            }

            function deleteForm(button) {
                const form = button.closest('.form-inline');
                const hr = form.nextElementSibling; // หาค่า <hr> ถัดไป
                const projectIdInput = form.querySelector('input[name="project_id[]"]');
                const projectId = projectIdInput ? projectIdInput.value : null; // ดึง project_id

                if (confirm("คุณแน่ใจหรือว่าต้องการลบฟอร์มนี้?")) {
                    // ถ้า projectId ไม่มี หมายถึงเป็นฟอร์มใหม่
                    if (!projectId) {
                        // ลบแบบฟอร์มจาก DOM
                        form.remove();
                        if (hr && hr.tagName === 'HR') {
                            hr.remove(); // ลบ <hr> ถ้าพบ
                        }
                        return; // ออกจากฟังก์ชัน
                    }

                    // ส่งคำขอลบไปยังเซิร์ฟเวอร์
                    fetch(`/delete-project/${projectId}`, {
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
                            alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                        });
                }
            }
        </script>






        <div class="button-container">
            <button type="submit" class="save"><i class=" fa-regular fa-floppy-disk"></i> บันทึก</button>
            <button class="cancel"> ยกเลิก</button>
        </div>


    </form>
</div>
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