<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePinjamanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_anggota' => 'required|exists:m_anggota,id_anggota',
            'id_bendahara' => 'required|exists:m_bendahara,id_bendahara',
            'tgl_pengajuan' => 'required|date',
            'jumlah_pinjaman' => 'required|numeric|min:1',
            'status_pinjaman' => 'required|string',
            'status_kesehatan' => 'required|string',
            'cicilan' => 'required|string',
            'lama' => 'required|numeric|min:1',
            'bunga' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'id_anggota.required' => 'Nama anggota harus dipilih.',
            'id_bendahara.required' => 'Nama bendahara harus dipilih.',
            'tgl_pengajuan.required' => 'Tanggal pengajuan harus diisi.',
            'jumlah_pinjaman.required' => 'Jumlah pinjaman harus diisi.',
            'jumlah_pinjaman.numeric' => 'Jumlah pinjaman harus berupa angka.',
            'jumlah_pinjaman.min' => 'Jumlah pinjaman harus lebih dari 0.',
            'status_pinjaman.required' => 'Status pinjaman harus diisi.',
            'status_kesehatan.required' => 'Status kesehatan harus diisi.',
            'cicilan.required' => 'Cicilan harus diisi.',
            'lama.required' => 'Lama harus diisi.',
            'lama.numeric' => 'Lama harus berupa angka.',
            'lama.min' => 'Lama harus lebih dari 0.',
            'bunga.required' => 'Bunga harus diisi.',
            'bunga.numeric' => 'Bunga harus berupa angka.',
            'bunga.min' => 'Bunga tidak boleh negatif.',
        ];
    }
}
