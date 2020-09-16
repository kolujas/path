<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Module extends Model{
        
        /** @var string Module primary key. */
        protected $primaryKey = 'id_module';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'folder',
        ];
    }