<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNurseryRequest extends Request {

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
            'nursery_name' => 'required',
            'nursery_type' => 'required',
            'nursery_color' => 'required'

        ];
    }

    public function messages(){
        return [
            'nursery_name.required' => 'Udfyld Navn',
            'nursery_type.required' => 'Vælg',
            'nursery_colorrequired' => 'Vælg en farve'
        ];
    }

}
