<?php

namespace App\Http\Requests;


use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    use FailedValidation;

    /**
     * Determine if the Customer is authorized to make this request.
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required',
        ];
    }

}
