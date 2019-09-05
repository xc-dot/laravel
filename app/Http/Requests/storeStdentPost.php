<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeStdentPost extends FormRequest
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
            'sname' => 'required|unique:student|max:255',
            'age' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
        'sname.required' => '名称必须填',
        'age.required' => '年龄必须填',
        ];
        }
}
