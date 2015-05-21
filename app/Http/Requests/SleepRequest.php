<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SleepRequest extends Request {

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
                    'start' => 'required',
                    'end' => 'required'
		];
	}
        
        public function messages(){
            return [
                'date.required' => 'Please enter a date',
                'start.required' => 'Please enter the starting time',
                'end.required' => 'Please enter the end time'    
            ];
        }

}
