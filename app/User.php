<?php
    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;

    class User extends Authenticatable {
        use HasApiTokens, Notifiable;

        /**
         * * User primary key.
         * @var string
         */
        protected $primaryKey = 'id_user';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'email',
            'name',
            'password',
            'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable () {
            return [
                'slug' => [
                    'source'	=> 'name',
                    'onUpdate'	=> true,
                ],
            ];
        }
    }