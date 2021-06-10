<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id'      => 'required|integer',
            'sub_category_id'  => 'nullable|integer',
            'brand_id'         => 'nullable|integer',
            'product_name'     => 'required',
            'product_details'  => 'required',
            'product_code'     => 'required',
            'product_quantity' => 'required|integer',
            'product_color'    => 'required',
            'product_size'     => 'required',
            'selling_price'    => 'required|integer',
            'discount_price'   => 'nullable|lt:selling_price',
            'video_link'       => 'nullable|',
            'main_slider'      => 'nullable|integer',
            'hot_deal'         => 'nullable|integer',
            'best_rated'       => 'nullable|integer',
            'mid_slider'       => 'nullable|integer',
            'hot_new'          => 'nullable|integer',
            'trend'            => 'nullable|integer',
            'image_one'        => 'nullable|mimes:jpg,jpeg,png',
            'image_two'        => 'nullable|mimes:jpg,jpeg,png',
            'image_three'      => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
}
