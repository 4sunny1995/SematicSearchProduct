<?php
    namespace App\Services;

use Illuminate\Support\Facades\Validator;

class Validation
    {
        public function validator(array $data)
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'confirm_password' =>['required', 'string', 'min:8'],
            ]);
        }
    }