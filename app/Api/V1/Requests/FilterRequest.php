<?php
namespace App\Api\V1\Controllers;
namespace App\Api\V1\Requests;

class FilterRequest extends JsonRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'shortName' => 'required',
            'group' => 'required',
            'type' => 'required',
            'productGroup' => 'required'
        ];
    }
}