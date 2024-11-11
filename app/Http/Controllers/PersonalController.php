<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Address;


class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::with('address')->get(); // ดึงข้อมูล address ที่เชื่อมกับ personal ด้วย
        return view('personal', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        // ดึงข้อมูลของผู้ใช้ที่มี ID พร้อมกับความสัมพันธ์ของภาพโปรไฟล์
        $personal = Personal::with('image')->find($id);

        // ตรวจสอบว่ามีข้อมูลภาพโปรไฟล์หรือไม่
        $imagePath = $personal->image->image_path ?? 'image/ดาวน์โหลด.jpg'; // หากไม่มีภาพโปรไฟล์ ให้ใช้ภาพดีฟอลต์

        return view('edit-personal', compact('personal', 'imagePath'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // ดึงข้อมูลส่วนตัวและที่อยู่ล่าสุด (สมมุติว่ามีแค่ข้อมูลของผู้ใช้คนเดียว)
        $personal = Personal::with('address')->first(); // หรืออาจใช้ findOrFail() ถ้าต้องการการตรวจสอบให้ละเอียด

        // ส่งข้อมูลไปยัง view
        return view('edit-personal', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // ตรวจสอบข้อมูลที่กรอก
        $request->validate([
            'firstname' => 'required|string|max:255',//required ห้ามเว้นว่าง
            'lastname' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',//nullable เว้นว่างได้
            'birthday' => 'required|date',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            // ตรวจสอบข้อมูลที่อยู่
            'number' => 'required|string|max:255',
            'village' => 'nullable|string|max:255',
            'moo' => 'nullable|string|max:255',
            'soi' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'tambon' => 'required|string|max:255',
            'amphoe' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        // ค้นหาข้อมูลส่วนตัว
        $personal = Personal::first(); // หรืออาจใช้ findOrFail() ถ้าต้องการการตรวจสอบให้ละเอียด
        $personal->update($request->only(['firstname', 'lastname', 'nickname', 'birthday', 'phone', 'email']));

        // ค้นหาและอัปเดตข้อมูลที่อยู่
        $address = $personal->address; // สมมุติว่ามีความสัมพันธ์ one-to-one
        $address->update($request->only(['number', 'village', 'moo', 'soi', 'road', 'tambon', 'amphoe', 'province', 'code']));

        // กลับไปยังหน้าแก้ไขพร้อมกับข้อความสำเร็จ
        return redirect()->route('personal.edit')->with('success', 'ข้อมูลถูกอัปเดตเรียบร้อยแล้ว');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
