<?php
    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable{
        use Notifiable;

        /** @var string User primary key. */
        protected $primaryKey = 'id_user';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'candidate_number', 'name', 'email', 'password', 'date_of_birth', 'level', 'id_role', 'id_member', 'member', 'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * * Create and return the User role.
         * @return [type]
         */
        public function role(){
            $role = [];
            switch ($this->id_role) {
                case 1:
                    $role['id_role'] = 1;
                    $role['name'] = 'Student';
                    break;
                case 2:
                    $role['id_role'] = 2;
                    $role['name'] = 'Administrator';
                    break;
            }
            if(!isset($this->attributes['role'])){
                $this->attributes['role'] = (object) $role;
            }
            return (object) $role;
        }
        
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
            ], 'create' => [
                'general' => [
                    'rules' => [
                        'name' => 'required|min:2|max:60',
                        'email' => 'required|email|unique:users',
                        'password' => 'nullable|min:4|max:40|confirmed',
                        'id_role' => 'required',
                    ], 'messages' => [
                        'en' => [
                            'name.required' => 'The Name is required.',
                            'name.min' => 'The Name cannot be less than :min characters.',
                            'name.max' => 'The Name cannot be more than :max characters.',
                            'email.required' => 'The Email is required.',
                            'email.email' => 'The Email must be a valid mail (example@mail.com).',
                            'email.unique' => 'The Email it\'s used.',
                            'password.min' => 'The Password cannot be less than :min characters.',
                            'password.max' => 'The Password cannot be more than :max characters.',
                            'password.confirmed' => 'The Passwords do not match.',
                            'id_role.required' => 'The Role is required.',
                        ],
                    ],
                ], 'admin' => [
                    'rules' => [
                        'password' => 'required',
                    ], 'messages' => [
                        'en' => [
                            'password.required' => 'The Password is required.',
                        ],
                    ],
                ], 'student' => [
                    'rules' => [
                        'candidate_number' => 'required|numeric|unique:users',
                        'level' => 'required|numeric',
                        'id_member' => 'required|numeric|unique:users',
                        'member' => 'required',
                    ], 'messages' => [
                        'en' => [
                            'candidate_number.required' => 'The Candidate Number is required.',
                            'candidate_number.numeric' => 'The Candidate Number must be numeric.',
                            'candidate_number.unique' => 'The Candidate Number it\'s used.',
                            'level.required' => 'The Level is required.',
                            'level.numeric' => 'The Level must be numeric.',
                            'id_member.required' => 'The Memeber ID is required.',
                            'id_member.numeric' => 'The Memeber ID must be numeric.',
                            'id_member.unique' => 'The Memeber ID it\'s used.',
                            'member.required' => 'The User must be Member from something.',
                        ],
                    ],
                ],
            ],'edit' => [
                'general' => [
                    'rules' => [
                        'name' => 'required|min:2|max:60',
                        'email' => 'required|email|unique:users',
                        'password' => 'nullable|min:4|max:40|confirmed',
                        'id_role' => 'required',
                    ], 'messages' => [
                        'en' => [
                            'name.required' => 'The Name is required.',
                            'name.min' => 'The Name cannot be less than :min characters.',
                            'name.max' => 'The Name cannot be more than :max characters.',
                            'email.required' => 'The Email is required.',
                            'email.email' => 'The Email must be a valid mail (example@mail.com).',
                            'email.unique' => 'The Email it\'s used.',
                            'password.min' => 'The Password cannot be less than :min characters.',
                            'password.max' => 'The Password cannot be more than :max characters.',
                            'password.confirmed' => 'The Passwords do not match.',
                            'id_role.required' => 'The Role is required.',
                        ],
                    ],
                ], 'student' => [
                    'rules' => [
                        'candidate_number' => 'required|numeric|unique:users',
                        'level' => 'required|numeric',
                        'id_member' => 'required|numeric|unique:users',
                        'member' => 'required',
                    ], 'messages' => [
                        'en' => [
                            'candidate_number.required' => 'The Candidate Number is required.',
                            'candidate_number.numeric' => 'The Candidate Number must be numeric.',
                            'candidate_number.unique' => 'The Candidate Number it\'s used.',
                            'level.required' => 'The Level is required.',
                            'level.numeric' => 'The Level must be numeric.',
                            'id_member.required' => 'The Memeber ID is required.',
                            'id_member.numeric' => 'The Memeber ID must be numeric.',
                            'id_member.unique' => 'The Memeber ID it\'s used.',
                            'member.required' => 'The User must be Member from something.',
                        ],
                    ],
                ],
            ],
        ];
        
        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable(){
            return [
                'slug' => [
                    'source'	=> 'name',
                    'onUpdate'	=> true,
                ]
            ];
        }
    }