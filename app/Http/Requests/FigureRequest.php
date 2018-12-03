<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FigureRequest extends FormRequest
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
			'name'=>'required',
			'icon'=>'required'
		];
	}

	public function messages ()
	{
		return[
			'name.required'=>'请输入图片标题',
			'icon.required'=>'请上传图片',
		];
	}
}
