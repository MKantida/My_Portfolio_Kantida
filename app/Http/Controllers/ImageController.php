<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // ตรวจสอบประเภทของไฟล์
            'person_id' => 'required|exists:tb_personal,person_id' // ตรวจสอบว่ามี person_id ใน tb_personal
        ]);

        // ตรวจสอบว่าไฟล์ภาพถูกส่งมาหรือไม่
        if ($request->file('image')) {
            try {
                // ค้นหาข้อมูลรูปภาพเดิม
                $existingImage = Image::where('person_id', $request->person_id)->first();

                // ถ้ามีรูปภาพเดิม ให้ลบออกจาก storage ก่อน
                if ($existingImage) {
                    Storage::disk('public')->delete($existingImage->image_path); // ลบไฟล์รูปภาพเก่าออก
                }

                // อัปโหลดไฟล์ภาพและเก็บที่อยู่ โดย store ใน public disk
                $imagePath = $request->file('image')->store('images', 'public');

                // ตรวจสอบว่าการอัปโหลดสำเร็จหรือไม่
                if (!$imagePath) {
                    return redirect()->back()->with('error', 'การอัปโหลดไฟล์ล้มเหลว');
                }

                // ถ้ามีข้อมูลภาพอยู่แล้วให้ทำการอัปเดต แทนที่ข้อมูลเดิม
                if ($existingImage) {
                    $existingImage->update([
                        'image_path' => $imagePath, // อัปเดตที่อยู่ไฟล์รูปภาพใหม่
                    ]);
                } else {
                    // สร้างรายการภาพใหม่ในตาราง tb_image ถ้าไม่มีข้อมูลเดิม
                    Image::create([
                        'person_id' => $request->person_id, // บันทึก person_id
                        'image_path' => $imagePath, // บันทึกที่อยู่ไฟล์ภาพ
                    ]);
                }

                return redirect()->back()->with('success', 'อัปโหลดภาพสำเร็จ!');
            } catch (\Exception $e) {
                // จับข้อผิดพลาดที่อาจเกิดขึ้นระหว่างการบันทึกข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage());
            }
        }

        // ถ้าไม่มีไฟล์ถูกอัปโหลด
        return redirect()->back()->with('error', 'กรุณาเลือกไฟล์ภาพเพื่ออัปโหลด');
    }
}
