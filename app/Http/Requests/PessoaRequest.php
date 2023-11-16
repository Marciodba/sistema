<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'apelido' =>'required|min:3|max:255|unique:vpessoageral'
            ,'pessoaapelido' =>'required|min:3|max:255|unique:vpessoageral'
            ,'nome' => [
                'required',
                'min:3',
                'max:10000',
            ],
        ];
 
        if ($this->method() === 'PUT'){
            $rules['apelido'] =[
                'required',
                'min:3',
                'max:10000',
               "unique:vpessoageral,pessoaapelido,{$this->id},id"
            ];
        }

        return $rules;
    }
}
