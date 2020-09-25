<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Auth extends Model{
        /** @var array The validation rules & messages. */
        public static $validation = [
            'login' => [
                'rules' => [
                    'data' => 'required',
                    'password' => 'required|min:4|max:40',
                ], 'messages' => [
                    'en' => [
                        'data.required' => 'The Data is required.',
                        'password.required' => 'The Password is required.',
                        'password.min' => 'The Password cannot be less than :min characters.',
                        'password.max' => 'The Password cannot be more than :max characters.',
                    ],
                ]
            ],
        ];
    }