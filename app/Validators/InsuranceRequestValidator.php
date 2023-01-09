<?php 

namespace App\Validators;

use Illuminate\Validation\Rule;

class ExampleRequestValidator {


    public static function validateCreate(array $request)
    {
        $rules = [
            'product' => [
                'string',
                'required',
                Rule::in(['auto', 'moto','autocarro','professionale'])
            ],
            'source'=>[
                'string',
                'required',
                Rule::in(['localhost', 'develop','meglioquestio.it'])
            ],
            'contractor_is_owner'=> [
                'required',
                'boolean'
            ]
        ];

        return AppValidator::fail($request, $rules, ExampleRequestValidator::messages());
    }


    private static function messages() : array {
        return [
            'required' => ':attribute is required',
            'integer' => ':attribute must be a integer',
            'string' => ':attribute must be an string',
            'boolean' => ':attribute must be a boolean true/false or 1, 0',
            'product.in' => 'Product is one of: auto, moto, autocarro, insurance',
            'exists' => ":input isn't valid for :attribute",
            'min' => "The :attribute ( :input ) it's too short",
            'date_of_birth.regex'=>"Birthday should be written in italian format. Ex: 28-01-1994",
            'source.in' => "The source of the request is invalid. Check your soruce or contqact sytem admin."
        ];
    }

}