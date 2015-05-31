<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateParentRequest extends Request {

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
            'email' => 'required',
            'street' => 'required',
            'number' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ];
    }


    public function messages(){
        return [
            'first_name.required' => 'Udfyld Fornavn',
            'last_name.required' => 'Udfyld Efternavn',
            'email.required' => 'Udfyld Email',
            'street.required' => 'Udfyld Adresse',
            'number.required' => 'Udfyld Nummer',
            'phone.required' => 'Udfyld Telefon',
            'password.required' => 'Udfyld Password'
        ];
    }

}
