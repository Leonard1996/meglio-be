<?php
namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class AppValidator
{
    public static function fail($requests, $rules, $messages = null) {
        $validation = Validator::make($requests, $rules, $messages);
        if ($validation->fails()) {
            return $validation->errors();
        }
        return false;
    }
}