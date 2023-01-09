<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleModelRequest extends FormRequest
{

    public function authorize() : bool {
        return true;
    }

    public function rules() : array
    {
        return [
            'make_id' => ['integer', 'required', 'exists:vehicle_makes,id']
        ];
    }
}
