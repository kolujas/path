<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Record extends Model{
        
        /** @var string Record primary key. */
        protected $primaryKey = 'id_record';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_student', 'file',
        ];
    }