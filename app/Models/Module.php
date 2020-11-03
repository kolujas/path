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
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A1:W' => [
                'name' => 'W',
                'folder' => 'A1',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 6,
            ], 'A1 Entry:L' => [
                'name' => 'L',
                'folder' => 'A1 Entry',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A1 Entry:W' => [
                'name' => 'W',
                'folder' => 'A1 Entry',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ], 'A1 Access:L' => [
                'name' => 'L',
                'folder' => 'A1 Access',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A1 Access:W' => [
                'name' => 'W',
                'folder' => 'A1 Access',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 4,
            ], 'A1 Achiever:L' => [
                'name' => 'L',
                'folder' => 'A1 Achiever',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A1 Achiever:W' => [
                'name' => 'W',
                'folder' => 'A1 Achiever',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ], 'A2 Preliminary:L' => [
                'name' => 'L',
                'folder' => 'A2 Preliminary',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A2 Preliminary:W' => [
                'name' => 'W',
                'folder' => 'A2 Preliminary',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ], 'A2 Elementary:L' => [
                'name' => 'L',
                'folder' => 'A2 Elementary',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'A2 Elementary:W' => [
                'name' => 'W',
                'folder' => 'A2 Elementary',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ], 'B1 Progress:L' => [
                'name' => 'L',
                'folder' => 'B1 Progress',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'B1 Progress:W' => [
                'name' => 'W',
                'folder' => 'B1 Progress',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ], 'B2 Competency:L' => [
                'name' => 'L',
                'folder' => 'B2 Competency',
                'file' => 'listening',
                'time' => '00:15:00',
                'questions' => 3,
            ], 'B2 Competency:W' => [
                'name' => 'W',
                'folder' => 'B2 Competency',
                'file' => 'writing',
                'time' => '00:15:00',
                'questions' => 5,
            ],
        ];
    }