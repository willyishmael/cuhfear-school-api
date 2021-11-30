<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRegistrationRequest;
use App\Models\StudentRegistration;
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
        return response(StudentRegistration::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRegistrationRequest $request)
    {
        $validated = $request->validated();

        $validatedData = $this->storeFile([
            'kartu_keluarga', 'sc_jarak_rumah', 'sk_domisili',
            'sk_lulus', 'sk_tidak_mampu', 'sk_pindah_tugas',
            'sertifikat_prestasi', 'sp_keabsahan_dokumen'
        ], $request, $validated);

        $validatedData['tahun_daftar'] = date('Y');

        StudentRegistration::create($validatedData);

        return response([
            'message' => 'Data has been stored',
            'stored_data' => $validated
        ]);
    }

    private function storeFile(array $fileKeys, Request $request, array $validatedData) {
        for ($i = 0; $i < count($fileKeys); $i++) {
            $key = $fileKeys[$i];
            if ($request->file($key)) {
                $validatedData[$key] = $request->file($key)->store("$key-files");
            }
        }
        return $validatedData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'message' => 'Show spesific item',
            'item' => StudentRegistration::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRegistrationRequest $request, $id)
    {
        $validated = $request->validate();

        $validatedData = $this->storeFile([
            'kartu_keluarga', 'sc_jarak_rumah', 'sk_domisili',
            'sk_lulus', 'sk_tidak_mampu', 'sk_pindah_tugas',
            'sertifikat_prestasi', 'sp_keabsahan_dokumen'
        ], $request, $validated);

        $data = StudentRegistration::find($id);
        $data->update($validatedData);

        return response([
            'message' => 'Data has been updated',
            'updated_data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentRegistration::find($id)->delete();

        return response([
            'message' => 'A data has been deleted'
        ]);
    }
}
