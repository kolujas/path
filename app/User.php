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
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'candidate_number', 'name', 'email', 'password', 'date_of_birth', 'level', 'id_role', 'id_member', 'member',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

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
            $this->attributes['role'] = (object) $role;
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
                    ], 'es' => [
                        'data.required' => 'El Dato es obligatorio.',
                        'password.required' => 'La Contraseña es obligatoria.',
                        'password.min' => 'La Contraseña no puede tener menos de :min caracteres.',
                        'password.max' => 'La Contraseña no puede tener más de :max caracteres.',
                    ],
                ]
            ], 'create' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:users',
                    'name' => 'required|min:2|max:60',
                    'email' => 'required|email|unique:users',
                    'password' => 'nullable|min:4|max:40|confirmed',
                    'level' => 'required|numeric',
                    'id_member' => 'required|numeric|unique:users',
                    'member' => 'required',
                ], 'messages' => [
                    'es' => [
                        'candidate_number.required' => 'El número de candidato es obligatorio.',
                        'candidate_number.numeric' => 'El número de candidato debe ser formato numérico.',
                        'candidate_number.unique' => 'El número de candidato ya está en uso.',
                        'name.required' => 'El nombre es obligatorio.',
                        'name.min' => 'El nombre no puede tener menos de :min caracteres.',
                        'name.max' => 'El nombre no puede tener más de :max caracteres.',
                        'email.required' => 'El correo es obligatorio.',
                        'email.email' => 'El correo debe ser formato email (ejemplo@mail.com).',
                        'email.unique' => 'El correo ya está en uso.',
                        'password.min' => 'La contraseña no puede tener menos de :min caracteres.',
                        'password.max' => 'La contraseña no puede tener más de :max caracteres.',
                        'password.confirmed' => 'Las contraseñas no coinciden.',
                        'level.required' => 'El nivel es obligatorio.',
                        'level.numeric' => 'El nivel debe ser formato numérico.',
                        'id_member.required' => 'El número de miembro es obligatorio.',
                        'id_member.numeric' => 'El número de miembro debe ser formato numérico.',
                        'id_member.unique' => 'El número de miembro ya está en uso.',
                        'member.required' => 'MENSAJE POR DEFECTO.',
                    ],
                ],
            ],'edit' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:users',
                    'name' => 'required|min:2|max:60',
                    'email' => 'required|email|unique:users',
                    'password' => 'nullable|min:4|max:40|confirmed',
                    'level' => 'required|numeric',
                    'id_member' => 'required|numeric|unique:users',
                    'member' => 'required',
                ], 'messages' => [
                    'es' => [
                        'candidate_number.required' => 'El número de candidato es obligatorio.',
                        'candidate_number.numeric' => 'El número de candidato debe ser formato numérico.',
                        'candidate_number.unique' => 'El número de candidato ya está en uso.',
                        'name.required' => 'El nombre es obligatorio.',
                        'name.min' => 'El nombre no puede tener menos de :min caracteres.',
                        'name.max' => 'El nombre no puede tener más de :max caracteres.',
                        'email.required' => 'El correo es obligatorio.',
                        'email.email' => 'El correo debe ser formato email (ejemplo@mail.com).',
                        'email.unique' => 'El correo ya está en uso.',
                        'password.min' => 'La contraseña no puede tener menos de :min caracteres.',
                        'password.max' => 'La contraseña no puede tener más de :max caracteres.',
                        'password.confirmed' => 'Las contraseñas no coinciden.',
                        'level.required' => 'El nivel es obligatorio.',
                        'level.numeric' => 'El nivel debe ser formato numérico.',
                        'id_member.required' => 'El número de miembro es obligatorio.',
                        'id_member.numeric' => 'El número de miembro debe ser formato numérico.',
                        'id_member.unique' => 'El número de miembro ya está en uso.',
                        'member.required' => 'MENSAJE POR DEFECTO.',
                    ],
                ],
            ],
        ];
    }