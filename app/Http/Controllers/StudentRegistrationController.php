<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $jalur)
    {
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'email' => 'required|email',
            'nomor_telepon' => 'required',
            'nama_wali' => 'required|max:50',
            'nomor_telepon_wali' => 'required|phone'
        ]);

        $validated['jalur_pendaftaran'] = $jalur;
        $validated['tahun_daftar'] = date("Y");

        StudentRegistration::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate();

        $data = StudentRegistration::find($id);
        $data->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRegistration $studentRegistration)
    {
        //
    }
}
