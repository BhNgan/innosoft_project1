<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
        return [
            'alias'         => 'nullable|string',
            'avatar'        => 'nullable|string',
            'detail'        => 'nullable|string',
            'description'   => 'nullable|string',
            'upload'        => 'nullable|file|image|mimes:jpeg,png,gif,bmp|max:2048',
            // 'product_code'  => 'required|string|max:191',
            'product_name'  => 'required|string|max:191',
            'receipt_price' => '|numeric',
            'bill_price'    => '|numeric',
            'stock'         => '|numeric',
            'is_show'       => 'nullable|boolean',
            'is_featured'   => 'nullable|boolean',
            'origin'        => 'nullable|string|max:30',
            'unit'          => 'nullable|string',
            'note'          => 'nullable|string',
            'warranty'      => 'nullable|string|max:30',
        ];
    }
}
