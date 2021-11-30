<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $jalur = ['zonasi','afirmasi','prestasi','perpindahan_tugas'];
        $jenis_kelamin = ['laki-laki', 'perempuan'];

        return [
            'jalur_pendaftaran' => ['required', Rule::in($jalur)],
            'nama' => 'required|max:50',
            'jenis_kelamin' => ['required', Rule::in($jenis_kelamin)],
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'email' => 'required|email',
            'nomor_telepon' => 'required',
            'nama_wali' => 'required|max:50',
            'nomor_telepon_wali' => 'required',
            'asal_sekolah' => 'required',
            'kartu_keluarga' => 'required|file|max:2048',
            'sc_jarak_rumah' => 'nullable|image|file|max:1024',
            'sk_domisili' => 'nullable|file|max:2048',
            'sk_lulus' => 'required|file|max:2048',
            'sk_tidak_mampu' => 'nullable|file|max:2048',
            'sk_pindah_tugas' => 'nullable|file|max:2048',
            'sertifikat_prestasi' => 'nullable|file|max:2048',
            'sp_keabsahan_dokumen' => 'required|file|max:2048',
        ];
    }
}
