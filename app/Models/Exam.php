<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model{
        
        /** @var string Exam primary key. */
        protected $primaryKey = 'id_exam';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'rules', 'password', 'scheduled_date_time',
        ];
    }