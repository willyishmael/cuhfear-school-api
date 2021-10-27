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
            'nip' => 'max:20|nullable',
            'tanggal_lahir' => 'required|date',
            'peran' => 'required|max:20',
            'jabatan' => 'max:20|nullabel',
            'foto' => 'image|nullable'
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
            'nip' => 'max:20|nullable',
            'tanggal_lahir' => 'required|date',
            'peran' => 'required|max:20',
            'jabatan' => 'max:20|nullabel',
            'foto' => 'image|nullable'
        ]);

        $hr = Student::find($id);
        $hr->nama = $validated['nama'];
        $hr->jenis_kelamin = $validated['jenis_kelamin'];
        $hr->nip = $validated['nip'];
        $hr->tanggal_lahir = $validated['tanggal_lahir'];
        $hr->peran = $validated['peran'];
        $hr->jabatan = $validated['jabatan'];
        $hr->foto = $validated['foto'];
        $hr->save();

        return response([
            'message' => 'Data has been updated',
            'updated_data' => $hr
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
