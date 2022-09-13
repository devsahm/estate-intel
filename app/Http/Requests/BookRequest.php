<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => 'required',
            "isbn" => 'required',
            "authors" => 'required|array',
            "number_of_pages" => 'required|numeric',
            "publisher" => 'required',
            "country" => 'required',
            "release_date" => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'authors.array' => 'The authors must be an array of author'
        ];
    }

}
