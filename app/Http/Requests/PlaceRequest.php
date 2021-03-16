<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'name' => 'required',
            'comment' => 'string|max:200',
            // 'place_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(){
        return [
            "string" =>"文字以外のものが入力されています。",
            "image" => "指定されたファイルが画像ではありません。",
            "mines" => "指定された拡張子（PNG/JPG）ではありません。",
            // "max" => "2Ｍを超えています。",
        ];
    }

}
