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
                    'description' => 'required',
                    'time_start' => 'required',
                    'time_end' => 'required'

		];
	}
        
        public function messages(){
            return [
                'description.required' => 'Udfyld besked',
                'date_from.required' => 'Vælg en start dato',
                'date_to.required' => 'Vælg en slut dato',
                'time_start.required' => 'Angiv en start tid',
                'time_end.required' => 'Angiv en slut tid'
            ];
        }

}
