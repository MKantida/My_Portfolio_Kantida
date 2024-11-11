<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Personal;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        $address = Address::all(); // ในกรณีที่คุณต้องการดึงข้อมูลที่อยู่ด้วย
        return view('personal.index', compact('personal', 'address'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address = Address::find($id);
        return view('edit-address', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
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

        $address = Address::find($id);
        $address->number = $request->number;
        $address->village = $request->village;
        $address->moo = $request->moo;
        $address->soi = $request->soi;
        $address->road = $request->road;
        $address->tambon = $request->tambon;
        $address->amphoe = $request->amphoe;
        $address->province = $request->province;
        $address->code = $request->code;
        $address->save();

        return redirect()->route('address.edit', $id)->with('success', 'ข้อมูลที่อยู่ถูกอัปเดตเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
