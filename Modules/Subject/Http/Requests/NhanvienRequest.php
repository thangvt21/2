<?php
namespace Modules\Subject\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NhanvienRequest extends FormRequest
{
    public function rules(Request $request)
    {
        return [
            'phongban' => 'required',
            'name' =>'required',
            'note' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'phongban.required' => 'Moi chon phong ban',
            'name.required' => 'Ban phai nhap ten',
            'note.required' => 'dien ghi chu'
        ];
    }
}

