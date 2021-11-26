<?php

namespace App\Http\Controllers;

use App\Models\HumanResource;
use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {return response(HumanResource::all());}

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
            'foto' => 'nullable|image|file|max:5120'
        ]);

        if ($request->file('foto')) {
            $validated['foto'] = $request->file('foto')->store('post-images');
        }

        HumanResource::create($validated);

        return response([
            'message' => 'new data has been added to HumanResources'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'message' => 'show spesific item',
            'item' => HumanResource::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
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

        $hr = HumanResource::find($id);
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HumanResource::find($id)->delete();

        return response()->json([
            'message' => 'A data has been deleted from HumanResources',
        ]);
    }
}
