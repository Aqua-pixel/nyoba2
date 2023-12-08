<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerpustakaanRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set ke true, karena kita ingin semua orang dapat mengakses endpoint ini.
    }

    public function rules()
    {
        return [
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
