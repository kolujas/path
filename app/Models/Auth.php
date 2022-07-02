<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Auth extends Model {
        /**
         * * The validation rules & messages.
         * @var array
         */
        public static $validation = [
            'login' => [
                'rules' => [
                    'data' => 'required',
                    'password' => 'required|min:4|max:40',
                ], 'messages' => [
                    'en' => [
                        'data.required' => 'Username is required.',
                        'password.required' => 'Password is required.',
                        'password.min' => 'Password cannot be less than :min characters.',
                        'password.max' => 'Password cannot be more than :max characters.',
                    ],
                ],
            ],
        ];
    }