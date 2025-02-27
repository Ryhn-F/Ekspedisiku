<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SopirUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_sopir'=> 'required',
            'kepala_bagian'=> 'required',
            'plat_no'=> 'required',
            'tujuan'=> 'required',
            'no_telp'=> 'required',
            'muatan'=> 'required',
            'tgl_berangkat'=> 'required',
            'keterangan'=> 'required',
            'deskripsi'=> 'required',
            'status'=> 'required', ];
    }
}
