<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Module extends Model{
        /**
         * * The Module array.
         * @var array
         */
        static $array = [
            'A1:L' => [
                'name' => 'L',
                'folder' => 'A1',
                'file' => 'listening',
            ], 'A1:W' => [
                'name' => 'W',
                'folder' => 'A1',
                'file' => 'writing',
            ],
        ];
    }