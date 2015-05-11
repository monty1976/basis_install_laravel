<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormRequest extends Request {

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
                    'date_from' => 'required',
                    'date_to' => 'required',
                    'description' => 'required'
		];
	}
        
        public function messages(){
            return [
                'description.required' => 'Please enter a description'
            ];
        }

}
