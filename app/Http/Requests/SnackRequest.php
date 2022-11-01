<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SnackRequest extends FormRequest
{
   public function rules()
    {
        return [
            'snack.name' => 'required|string|max:100',
            'snack.overview' => 'required|string|max:4000',
            'image' => 'required'
        ];
    }
}
