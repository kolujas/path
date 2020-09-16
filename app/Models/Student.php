<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Student extends Model{
        
        /** @var string Student primary key. */
        protected $primaryKey = 'id_student';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_user', 'id_exam',
        ];
    }