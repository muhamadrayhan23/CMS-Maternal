<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return true;
    // }

    public function rules(): array
    {
        return [
            'link_name' => 'required|string|max:100|unique:link,link_name,NULL,id_link,deleted_at,NULL',
            'link_address' => 'required|string|max:255',
        ];
    }
}
