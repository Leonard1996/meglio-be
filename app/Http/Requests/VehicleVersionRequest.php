<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleVersionRequest extends FormRequest
{

    public function authorize() : bool {
        return true;
    }

    public function rules() : array
    {
        return [
            'model_id' => ['integer', 'required', 'exists:vehicle_models,id']
        ];
    }
}
