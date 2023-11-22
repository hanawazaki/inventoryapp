<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'part_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'type_id' => 'required|integer',
            'is_featured' => 'required|integer',
            'is_best_seller' => 'required|integer',
            'variants' => 'required|array|min:1',
            'variants.*.variant' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric',
        ];
    }
}
