<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Module extends Model{
        /**
         * * The Module array.
         * @var array
         */
        static $array = [
            'A1- Entry:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'A1- Entry',
                'file' => 'listening',
                'time' => '00:20:00',
                'questions' => 3,
            ], 'A1- Entry:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'A1- Entry',
                'file' => 'reading_and_writing',
                'time' => '01:15:00',
                'questions' => 5,
            ],
            'A1 Access:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'A1 Access',
                'file' => 'listening',
                'time' => '00:20:00',
                'questions' => 3,
            ], 'A1 Access:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'A1 Access',
                'file' => 'reading_and_writing',
                'time' => '01:15:00',
                'questions' => 5,
            ],
            'A1+ Achiever:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'A1+ Achiever',
                'file' => 'listening',
                'time' => '00:23:00',
                'questions' => 3,
            ], 'A1+ Achiever:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'A1+ Achiever',
                'file' => 'reading_and_writing',
                'time' => '01:15:00',
                'questions' => 5,
            ],
            'A2 Preliminary:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'A2 Preliminary',
                'file' => 'listening',
                'time' => '00:23:00',
                'questions' => 3,
            ], 'A2 Preliminary:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'A2 Preliminary',
                'file' => 'reading_and_writing',
                'time' => '01:15:00',
                'questions' => 5,
            ],
            'A2+ Elementary:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'A2+ Elementary',
                'file' => 'listening',
                'time' => '00:27:00',
                'questions' => 3,
            ], 'A2+ Elementary:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'A2+ Elementary',
                'file' => 'reading_and_writing',
                'time' => '01:45:00',
                'questions' => 5,
            ],
            'B1 Progress:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'B1 Progress',
                'file' => 'listening',
                'time' => '00:30:00',
                'questions' => 3,
            ], 'B1 Progress:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'B1 Progress',
                'file' => 'reading_and_writing',
                'time' => '01:45:00',
                'questions' => 5,
            ],
            'B2 Competency:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'B2 Competency',
                'file' => 'listening',
                'time' => '00:50:00',
                'questions' => 3,
            ], 'B2 Competency:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'B2 Competency',
                'file' => 'reading_and_writing',
                'time' => '01:45:00',
                'questions' => 5,
            ],
            'DEMO:L' => [
                'initial' => 'L',
                'name' => 'Listening',
                'folder' => 'DEMO',
                'file' => 'listening',
                'time' => '00:20:00',
                'questions' => 3,
            ], 'DEMO:RW' => [
                'initial' => 'RW',
                'name' => 'Read and Writing',
                'folder' => 'DEMO',
                'file' => 'reading_and_writing',
                'time' => '01:15:00',
                'questions' => 5,
            ],
        ];
    }