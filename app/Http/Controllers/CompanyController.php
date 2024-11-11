<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('company', compact('company'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // ดึงข้อมูลโปรเจคทั้งหมดจากฐานข้อมูล
        $company = Company::all();

        // ส่งข้อมูลไปยัง view เพื่อแสดงข้อมูลโปรเจค
        return view('edit-company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // ตรวจสอบข้อมูล
        $request->validate([
            'company.*' => 'required|string|max:255',
            'position.*' => 'nullable|string|max:255',
            'salary.*' => 'nullable|string|max:255',
            'startday.*' => 'required|date',
            'endday.*' => 'required|date',
            'details.*' => 'nullable|string|max:255',
        ]);

        // ตรวจสอบและบันทึกข้อมูล
        foreach ($request->company as $index => $companyName) {
            // กำหนด companyId ให้เป็น null หากไม่มี
            $companyId = $request->company_id[$index] ?? null;

            // ถ้ามี companyId ให้ทำการอัปเดต
            if ($companyId) {
                $company = Company::find($companyId);
                if ($company) {
                    // อัปเดตข้อมูลบริษัทที่มีอยู่
                    $company->company = $companyName;
                    $company->position = $request->position[$index] ?? null;
                    $company->salary = $request->salary[$index] ?? null;
                    $company->startday = $request->startday[$index];
                    $company->endday = $request->endday[$index];
                    $company->details = $request->details[$index] ?? null;
                    $company->save();
                }
            } else {
                // ถ้าไม่มี companyId ให้สร้างบริษัทใหม่
                Company::create([
                    'company' => $companyName,
                    'position' => $request->position[$index] ?? null,
                    'salary' => $request->salary[$index] ?? null,
                    'startday' => $request->startday[$index],
                    'endday' => $request->endday[$index],
                    'details' => $request->details[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('company.edit')->with('success', 'ข้อมูลโปรเจคถูกอัปเดตเรียบร้อยแล้ว');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // ค้นหาโปรเจคที่ต้องการลบ
        $company = Company::find($id);

        if ($company) {
            $company->delete(); // ลบโปรเจค
            return response()->json(['success' => 'ข้อมูลการทำงานถูกลบเรียบร้อยแล้ว']);
        }

        return response()->json(['error' => 'ไม่พบข้อมูลโปรเจค'], 404);
    }

}

