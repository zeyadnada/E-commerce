<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:256', 'min:2'],
            'product_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:20480'],
            'product_quantity' => ['nullable', 'integer', 'max:999', 'min:1'],
            'product_price' => ['required', 'numeric', 'max:99999.99', 'min:1'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'product_description' => ['string', 'max:20000', 'min:6'],
            // 'admin_id' => ['required', 'integer', 'exists:admins,admin_id'],


        ];
    }
}
