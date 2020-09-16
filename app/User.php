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
            'candidate_number', 'name', 'email', 'password', 'date_of_birth', 'level', 'id_member', 'member',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];
        
        /** @var array The validation rules & messages. */
        public static $validation = [
            'login' => [

            ], 'crear' => [
                'rules' => [
                    'id_suscriptor' => 'nullable|numeric|unique:users',
                    'nombre' => 'required|min:2|max:60',
                    'correo' => 'required|email|max:100|unique:users',
                    'clave' => 'required|min:4|max:40|confirmed',
                    'id_nivel' => 'required',
                ], 'messages' => [
                    'es' => [
                        'id_suscriptor.numeric' => 'El Número de Suscriptor debe ser formato numérico.',
                        'id_suscriptor.unique' => 'El Número de Suscriptor ya está en uso.',
                        'nombre.required' => 'El Nombre es obligatorio.',
                        'nombre.min' => 'El Nombre no puede tener menos de :min caracteres.',
                        'nombre.max' => 'El Nombre no puede tener más de :max caracteres.',
                        'correo.required' => 'El Correo es obligatorio.',
                        'correo.email' => 'El Correo debe ser formato email (ejemplo@correo.com).',
                        'correo.unique' => 'El Correo ya está en uso.',
                        'clave.required' => 'La Contraseña es obligatoria.',
                        'clave.min' => 'La Contraseña no puede tener menos de :min caracteres.',
                        'clave.max' => 'La Contraseña no puede tener más de :max caracteres.',
                        'clave.confirmed' => 'Las Contraseñas no coinciden.',
                        'id_nivel.required' => 'El Nivel de Usuario es obligatorio.',
                    ],
                ],
            ],'editar' => [
                //
            ],
        ];
    }