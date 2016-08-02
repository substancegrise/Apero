<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AperoRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'email' =>'required|email',
            'date_event'=> 'required|after:today',
            'category_id' => 'required|integer',
            'date' => 'required|after:today',
            'status' => 'in:published,unpublished',
            'content'=> 'required|string',
            'abstract' => 'required|string',
            'tags.*' => 'required|integer',
            'picture' => 'image|max:3000'
        ];
    }

}
