<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {return response(Student::all());}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'jenis_kelamin' => 'required|max:20',
            'nisn' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|max:20',
            'tahun_masuk' => 'required|year',
            'jabatan' => 'nullable|max:20',
            'status' => 'required|max:20',
        ]);

        Student::create($validated);

        return response([
            'message' => 'new data has been added to Student'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'message' => 'show spesific item',
            'item' => Student::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'jenis_kelamin' => 'required|max:20',
            'nisn' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|max:20',
            'tahun_masuk' => 'required|year',
            'jabatan' => 'nullable|max:20',
            'status' => 'required|max:20',
        ]);

        $student = Student::find($id);
        $student->nama = $validated['nama'];
        $student->jenis_kelamin = $validated['jenis_kelamin'];
        $student->nisn = $validated['nisn'];
        $student->tanggal_lahir = $validated['tanggal_lahir'];
        $student->jurusan = $validated['jurusan'];
        $student->tahun_masuk = $validated['tahun_masuk'];
        $student->jabatan = $validated['jabatan'];
        $student->status = $validated['status'];
        $student->save();

        return response([
            'message' => 'Data has been updated',
            'updated_data' => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();

        return response()->json([
            'message' => 'A data has been deleted from Student',
        ]);
    }
}
