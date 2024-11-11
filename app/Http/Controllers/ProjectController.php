<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // แสดงรายการโปรเจคทั้งหมด
    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    // แสดงฟอร์มสร้างโปรเจคใหม่
    public function create() {}

    // จัดเก็บข้อมูลโปรเจคใหม่
    public function store(Request $request) {}

    // แสดงหน้าแก้ไขข้อมูล
    public function edit()
    {
        // ดึงข้อมูลโปรเจคทั้งหมดจากฐานข้อมูล
        $projects = Project::all();

        // ส่งข้อมูลไปยัง view เพื่อแสดงข้อมูลโปรเจค
        return view('edit-project', compact('projects'));
    }


    public function update(Request $request)
    {
        // ตรวจสอบข้อมูล
        $request->validate([
            'project.*' => 'required|string|max:255',
            'tools.*' => 'nullable|string|max:255',
            'link.*' => 'nullable|string|max:255',
        ]);

        // ตรวจสอบและบันทึกข้อมูล
        foreach ($request->project as $index => $projectName) {
            $projectId = $request->project_id[$index] ?? null;

            if ($projectId) {
                // อัปเดตโปรเจคที่มีอยู่
                $project = Project::find($projectId);
                if ($project) {
                    $project->project = $projectName;
                    $project->tools = $request->tools[$index];
                    $project->link = $request->link[$index];
                    $project->save();
                }
            } else {
                // สร้างโปรเจคใหม่
                Project::create([
                    'project' => $projectName,
                    'tools' => $request->tools[$index],
                    'link' => $request->link[$index],
                ]);
            }
        }

        return redirect()->route('projects.edit')->with('success', 'ข้อมูลโปรเจคถูกอัปเดตเรียบร้อยแล้ว');
    }





    // ลบโปรเจค
    public function destroy($id)
    {
        // ค้นหาโปรเจคที่ต้องการลบ
        $project = Project::find($id);

        if ($project) {
            $project->delete(); // ลบโปรเจค
            return response()->json(['success' => 'ข้อมูลโปรเจคถูกลบเรียบร้อยแล้ว']);
        }

        return response()->json(['error' => 'ไม่พบข้อมูลโปรเจค'], 404);
    }

}
