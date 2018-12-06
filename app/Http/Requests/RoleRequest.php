<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		return [
			'title'=>'required',
			'name'=>'required',
			'guard_name'=>'required'
		];

    }
	public function messages ()
	{
		return[
			'title.required'=>'请输入标题',
			'name.required'=>'请输入角色名称',
			'guard_name.required'=>'请输入守卫名称',
		];
	}
}
