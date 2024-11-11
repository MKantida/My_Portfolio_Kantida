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
<h2>แก้ไขข้อมูลรายละเอียดโปรเจค</h2>

<div id="form-container">
    <form action="{{ route('company.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-container">
            @foreach($company as $index => $company)
            <div class="form-inline">
                <input type="hidden" name="company_id[]" value="{{ $company->company_id }}">

                <div class="form-header">
                    <button type="button" class="add" onclick="addForm()"> <i class="fa-solid fa-plus"></i></button>
                    @if ($index > 0) <!-- แสดงปุ่มลบเฉพาะฟอร์มที่ 2 เป็นต้นไป -->
                    <button type="button" class="delete" onclick="deleteForm(this)"> <i class="fa-solid fa-minus"></i></button>
                    @endif
                </div>

                <div class="full-width">
                    <label class="label" for="company">ชื่อบริษัท::</label>
                    <input type="text" id="company" name="company[]" value="{{ old('company.'.$loop->index, $company->company) }}" placeholder="Enter company">
                </div>

                <div class="less-width">
                    <label class="label" for="position">ตำแหน่ง:</label>
                    <input type="text" id="position" name="position[]" value="{{ old('position.'.$loop->index, $company->position) }}" placeholder="Enter position">
                </div>

                <div class="less-width">
                    <label class="label" for="salary">อัตราเงินเดือน:</label>
                    <input type="text" id="salary" name="salary[]" value="{{ old('salary.'.$loop->index, $company->salary) }}" placeholder="Enter salary">
                </div>
                <div class="less-width">
                    <label class="label" for="startday">วันที่เริ่มงาน::</label>
                    <input type="date" id="startday" name="startday[]" value="{{ old('startday.'.$loop->index, $company->startday) }}" placeholder="Enter startday">
                </div>

                <div class="less-width">
                    <label class="label" for="endday">วันที่ออกจากงาน:</label>
                    <input type="date" id="endday" name="endday[]" value="{{ old('endday.'.$loop->index, $company->endday) }}" placeholder="Enter endday">
                </div>

                <div class="full-area">
                    <label class="label" for="details">รายละเอียดงาน:</label>

                    <textarea id="details" placeholder="Write something.." name="details[]">{{ old('details.'.$loop->index, $company->details) }}</textarea>
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
                    <label class="label" for="company">ชื่อบริษัท::</label>
                    <input type="text" name="company[]" placeholder="ชื่อบริษัท"required>
                </div>

                <div class="less-width">
                    <label class="label" for="position">ตำแหน่ง:</label>
                    <input type="text" name="position[]" placeholder="ตำแหน่ง"required>
                </div>

                <div class="less-width">
                    <label class="label" for="salary">อัตราเงินเดือน:</label>
                    <input type="text" name="salary[]" placeholder="เงินเดือน">
                </div>
                <div class="less-width">
                    <label class="label" for="startday">วันที่เริ่มงาน::</label>
                    <input type="date" name="startday[]" placeholder="วันเริ่มต้น"required>
                </div>

                <div class="less-width">
                    <label class="label" for="endday">วันที่ออกจากงาน:</label>
                    <input type="date" name="endday[]" placeholder="วันสิ้นสุด"required>
                </div>

                <div class="full-area">
                    <label class="label" for="details">รายละเอียดงาน:</label>
                    <textarea name="details[]" placeholder="รายละเอียด"></textarea>
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
                const companyIdInput = form.querySelector('input[name="company_id[]"]');
                const companyId = companyIdInput ? companyIdInput.value : null; // ดึง company_id

                if (confirm("คุณแน่ใจหรือว่าต้องการลบฟอร์มนี้?")) {
                    // ถ้า companyId ไม่มี หมายถึงเป็นฟอร์มใหม่
                    if (!companyId) {
                        // ลบแบบฟอร์มจาก DOM
                        form.remove();
                        if (hr && hr.tagName === 'HR') {
                            hr.remove(); // ลบ <hr> ถ้าพบ
                        }
                        return; // ออกจากฟังก์ชัน
                    }

                    // ส่งคำขอลบไปยังเซิร์ฟเวอร์
                    fetch(`/delete-company/${companyId}`, {
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