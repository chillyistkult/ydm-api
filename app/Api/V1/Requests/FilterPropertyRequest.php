<?php
namespace App\Api\V1\Controllers;
namespace App\Api\V1\Requests;
use Dingo\Api\Http\FormRequest;

class FilterPropertyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            
        ];
    }
}