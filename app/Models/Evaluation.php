<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Evaluation extends Model{
        
        /** @var string Evaluation primary key. */
        protected $primaryKey = 'id_evaluation';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_exam', 'id_module',
        ];
    }