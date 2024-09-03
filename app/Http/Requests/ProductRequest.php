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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code_no' => 'required',
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'in_stock' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(){
        return [
            'code_no.required' => 'Code Number ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'price.numeric' => '‌ဈေးနှုန်းသည် ကိန်းဂဏန်းသာဖြစ်ရမည်။',
        ];
    }
    
}
