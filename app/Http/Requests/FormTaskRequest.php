<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormTaskRequest extends FormRequest
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
            'title' => 'required|min:3',
            'content' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png',
            'due_date' => 'date'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống!',
            'title.min' => 'Tiêu đê phải trên 3 ký tự!',
            'content.required' => 'Nội dung không được để trống!',
            'content.min' => 'Nội dung phải trên 3 ký tự!',
            'image.image' => 'Image phải là định dạng ảnh',
            'image.mimes' => 'Định dạng ảnh phải là jpeg, png',
            'due_date.date' => 'Ngày tạo phải là định dạng ngày tháng!'
        ];
    }
}
