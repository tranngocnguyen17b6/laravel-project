<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormatValidationRequest extends FormRequest
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
    public function rules():array
    {
        //dd($_POST);
        if($_POST['question_typeof']=='radio' || $_POST['question_typeof']=='checkbox')
        {
            $check='required|min:6';
        }
        else{
            $check="";
        }
        
        return [
            'question_title'=>'required|min:6',
            'question_typeof'=>'required',
            'duress'=>'required',
            'answer_title.*'=>$check,
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute 空欄にすることはできません',
            'question_title.min'=>':attribute 最低6文字',
            'answer_title.*.min'=>':attribute 最低6文字'
        ];
    }
    public function attributes()
    {
        return [
            'question_title'=>"タイトル",
            'question_typeof'=>'入力方式',
            'duress'=> '必須フィールド',
            'answer_title.*'=>'答え',
        ];
    }
}
