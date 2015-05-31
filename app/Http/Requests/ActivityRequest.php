<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActivityRequest extends Request {

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
                'date' => 'required',
                'headline' => 'required',
                'content' => 'required'
            ];
	}
        
        public function messages(){
            return [
                'headline.required' => 'Udfyld Overskrift',
                'date.required' => 'Angiv en gyldig dato',
                'content.required' => 'Udfyld indhold'
            ];
        }

}
