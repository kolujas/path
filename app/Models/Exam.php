<?php
    namespace App\Models;
    
    use App\Models\Student;
    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model{
        /** @var string Exam primary key. */
        protected $primaryKey = 'id_exam';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'name', 'rules', 'password', 'scheduled_date_time', 'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password',
        ];

        /**
         * * Get all the Students who match with the primary key.
         * @return [type]
         */
        public function students(){
            return $this->hasMany(Student::class, 'id_exam', 'id_exam');
        }
        
        /** @var array The validation rules & messages. */
        public static $validation = [
            'auth' => [
                'rules' => [
                    'accept' => 'required',
                    'ID' => 'required|mimetypes:image/jpeg,image/png',
                ], 'messages' => [
                    'en' => [
                        'accept.required' => 'Accept the rules first.',
                        'ID.required' => 'The ID is required.',
                        'ID.mimimetypesn' => 'The ID must be an image JPG/JPEG, or PNG.',
                    ],
                ]
            ], 'create' => [
                'rules' => [
                    'name' => 'required|min:2|max:60',
                    'password' => 'required|min:4|max:40|confirmed',
                    'scheduled_date_time' => 'required|date',
                ], 'messages' => [
                    'en' => [
                        'name.required' => 'The Name is required.',
                        'name.min' => 'The Name cannot be less than :min characters.',
                        'name.max' => 'The Name cannot be more than :max characters.',
                        'password.required' => 'The Password is required.',
                        'password.min' => 'The Password cannot be less than :min characters.',
                        'password.max' => 'The Password cannot be more than :max characters.',
                        'password.confirmed' => 'The Passwords do not match.',
                        'scheduled_date_time.required' => 'The Scheduled Date Time is required.',
                        'scheduled_date_time.date' => 'The Scheduled Date Time must be a valid date.',
                    ],
                ],
            ],'edit' => [
                'rules' => [
                    'name' => 'required|min:2|max:60',
                    'password' => 'nullable|min:4|max:40|confirmed',
                    'scheduled_date_time' => 'required|date',
                ], 'messages' => [
                    'en' => [
                        'name.required' => 'The Name is required.',
                        'name.min' => 'The Name cannot be less than :min characters.',
                        'name.max' => 'The Name cannot be more than :max characters.',
                        'password.min' => 'The Password cannot be less than :min characters.',
                        'password.max' => 'The Password cannot be more than :max characters.',
                        'password.confirmed' => 'The Passwords do not match.',
                        'scheduled_date_time.required' => 'The Scheduled Date Time is required.',
                        'scheduled_date_time.date' => 'The Scheduled Date Time must be a valid date.',
                    ],
                ],
            ],
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