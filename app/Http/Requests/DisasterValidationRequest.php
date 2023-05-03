<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisasterValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'disaster_title'=> 'required| min:6',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute 空欄にすることはできません',
            'disaster_title.min'=>':attribute 最低6文字',
        ];
    }
    public function attributes()
    {
        return [
            'disaster_title'=>"災害",
            'status'=>'スターテス'
        ];
    }
}
