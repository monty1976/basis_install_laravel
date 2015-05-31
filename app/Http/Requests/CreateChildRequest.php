<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateChildRequest extends Request {

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
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'image' => 'required'

        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Udfyld Fornavn',
            'last_name.required' => 'Udfyld Efternavn',
            'birthday.required' => 'Udfyld Fødselsdag',
            'image.required' => 'Vælg billed'
        ];
    }

}
