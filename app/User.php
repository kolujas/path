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
            'name', 'email', 'password', 'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
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