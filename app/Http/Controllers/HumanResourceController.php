<?php

namespace App\Http\Controllers;

use App\Models\HumanResource;
use App\Models\User;
use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    /**
     * Check user token for auth
     *
     * @param string $remember_token
     * @return boolean $user_is_null
     */
    public function checkRememberToken($remember_token)
    {
        $user = User::where('remember_token', $remember_token)->first();
        return $user == null ? true : false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $human_resource = HumanResource::all();

        return view('human-resource.index', ['human_resource' => $human_resource]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->checkRememberToken($request['remember_token'])) {
            return response()->json([
                'message' => 'not a valid user, please re login',
                'redirect_to' => 'login page'
            ]);
        }

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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'human_resource' => HumanResource::find($id)
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
        if ($this->checkRememberToken($request['remember_token'])) {
            return response()->json([
                'message' => 'not a valid user, please re login',
                'redirect_to' => 'login page'
            ]);
        }

        $validated = $request->validate([
            'remember_token' => 'required',
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

        return response()->json([
            'message' => 'new data has been added to HumanResources',
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
        $hr = HumanResource::find($id);
        $hr->delete();

        return response()->json([
            'message' => 'data has been deleted from HumanResources',
        ]);
    }
}
