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
        //
    }

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

        HumanResource::create($validated);

        return response()->json([
            'message' => 'new data has been added to HumanResources'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource  $human_resource
     * @return \Illuminate\Http\Response
     */
    public function show(HumanResource $human_resource)
    {
        return response()->json([
            'human_resource' => $human_resource->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HumanResource  $human_resource
     * @return \Illuminate\Http\Response
     */
    public function edit(HumanResource $human_resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\human_resource  $human_resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HumanResource $human_resource, $id)
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

        $hr = $human_resource->find($id);
        $hr->nama = $validated['nama'];
        $hr->jenis_kelamin = $validated['jenis_kelamin'];
        $hr->nip = $validated['nip'];
        $hr->tanggal_lahir = $validated['tanggal_lahir'];
        $hr->peran = $validated['peran'];
        $hr->jabatan = $validated['jabatan'];
        $hr->foto = $validated['foto'];
        $hr->save();

        return response()->json([
            'message' => 'new data has been added to HumanResources',
            'updated_data' => $hr
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\human_resource  $human_resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(HumanResource $human_resource, $id)
    {
        $hr = $human_resource->find($id);
        $hr->delete();

        return response()->json([
            'message' => 'data has been deleted from HumanResources',
        ]);
    }
}
