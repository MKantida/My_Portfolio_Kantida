<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\School;
use App\Models\University;

class EducationalController extends Controller
{
    public function index()
    {
        // ใช้ Eager Loading เพื่อนำข้อมูลมหาวิทยาลัยที่สัมพันธ์กันไปด้วย
        $schools = School::with('universities')->get();
        return view('educational', compact('schools'));
    }


    public function edit()
    {
        // ดึงข้อมูลโรงเรียนแรก
        $school = School::first();

        // ตรวจสอบว่ามีโรงเรียนหรือไม่
        if (!$school) {
            return redirect()->back()->with('error', 'ไม่พบโรงเรียน');
        }

        // ดึงข้อมูลมหาวิทยาลัยที่เชื่อมโยงกับโรงเรียน
        $universities = University::where('school_id', $school->school_id)->get();

        // ส่งข้อมูลไปยัง view
        return view('edit-educational', compact('school', 'universities'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // ตรวจสอบข้อมูลโรงเรียน
        $request->validate([
            'schoolname' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'grade' => 'required|numeric',
            // ตรวจสอบข้อมูลมหาวิทยาลัยที่แนบมา
            'universities.*.universityname' => 'required|string|max:255',
            'universities.*.level' => 'nullable|string|max:255',
            'universities.*.degree' => 'nullable|string|max:255',
            'universities.*.faculty' => 'nullable|string|max:255',
            'universities.*.major' => 'nullable|string|max:255',
            'universities.*.gpa' => 'nullable|numeric|max:4.00',
        ]);

        // อัปเดตข้อมูลโรงเรียน
        $school = School::firstOrFail(); // ดึงโรงเรียนแรกในฐานข้อมูล
        $school->schoolname = $request->schoolname;
        $school->program = $request->program;
        $school->grade = $request->grade;
        $school->save();


        // ตรวจสอบและบันทึกข้อมูลมหาวิทยาลัย
        foreach ($request->universities as $universityData) {
            // ตรวจสอบหาก university_id มีอยู่ในข้อมูลแล้ว ให้ทำการอัปเดต
            $university = University::find($universityData['university_id'] ?? null);
            // ตรวจสอบว่ามีมหาวิทยาลัยหรือไม่
            if ($university) {
                // อัปเดตข้อมูลมหาวิทยาลัย
                $university->update([
                    'school_id' => $school->school_id, // เพิ่มการบันทึก school_id
                    'universityname' => $universityData['universityname'],
                    'level' => $universityData['level'],
                    'degree' => $universityData['degree'],
                    'faculty' => $universityData['faculty'],
                    'major' => $universityData['major'],
                    'gpa' => $universityData['gpa'],
                ]);
            } else {
                // ถ้าไม่มี university_id ให้สร้างใหม่
                University::create([
                    'school_id' => $school->school_id, // เพิ่มการบันทึก school_id
                    'universityname' => $universityData['universityname'],
                    'level' => $universityData['level'],
                    'degree' => $universityData['degree'],
                    'faculty' => $universityData['faculty'],
                    'major' => $universityData['major'],
                    'gpa' => $universityData['gpa'],
                ]);
            }
        }


        return redirect()->route('educational.edit')->with('success', 'ข้อมูลการศึกษาได้รับการอัปเดตเรียบร้อยแล้ว');
    }


    // ลบโปรเจค
    public function delete($universityId)
    {
        // ค้นหามหาวิทยาลัยตาม ID
        $university = University::find($universityId);

        if ($university) { // ลบมหาวิทยาลัย
            $university->delete();
            return response()->json(['success' => 'ลบมหาวิทยาลัยสำเร็จ']);
        } else {
            return response()->json(['error' => 'ไม่พบมหาวิทยาลัยที่ต้องการลบ'], 404);
        }
    }


}
