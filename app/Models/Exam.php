<?php
    namespace App\Models;
    
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Module;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model{
        use Sluggable, SluggableScopeHelpers;

        /** @var string Exam primary key. */
        protected $primaryKey = 'id_exam';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'name', 'rules', 'password', 'scheduled_date_time', 'slug', 'id_user'
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            //
        ];

        /**
         * * Get all the Evaluations who match with the primary key.
         * @return [type]
         */
        public function evaluations(){
            return $this->hasMany(Evaluation::class, 'id_exam', 'id_exam');
        }

        /**
         * * Create and returns the Exam Candidates.
         * @return [type]
         */
        public function candidates(){
            $candidates = collect([]);
            foreach ($this->evaluations as $evaluation) {
                $candidates->push(Candidate::find($evaluation->id_candidate));
            }
            return $candidates;
        }
        
        /** @var array The validation rules & messages. */
        public static $validation = [
            'auth' => [
                'rules' => [
                    'confirmed' => 'required',
                ], 'messages' => [
                    'en' => [
                        'confirmed.required' => 'Accept the rules first.',
                    ],
                ]
            ], 'create' => [
                'rules' => [
                    'name' => 'required|min:2|max:60',
                    'password' => 'required|min:4|max:40',
                    'scheduled_date_time' => 'required|date',
                    'candidates' => 'required',
                ], 'messages' => [
                    'en' => [
                        'name.required' => 'Name is required.',
                        'name.min' => 'Name cannot be less than :min characters.',
                        'name.max' => 'Name cannot be more than :max characters.',
                        'password.required' => 'Password is required.',
                        'password.min' => 'Password cannot be less than :min characters.',
                        'password.max' => 'Password cannot be more than :max characters.',
                        'scheduled_date_time.required' => 'Scheduled date time is required.',
                        'scheduled_date_time.date' => 'Scheduled date time must be a valid date.',
                        'candidates.required' => 'A candidate is required.',
                    ],
                ],
            ], 'edit' => [
                'rules' => [
                    'name' => 'required|min:2|max:60',
                    'password' => 'nullable|min:4|max:40',
                    'scheduled_date_time' => 'required|date',
                    'candidates' => 'required',
                ], 'messages' => [
                    'en' => [
                        'name.required' => 'Name is required.',
                        'name.min' => 'Name cannot be less than :min characters.',
                        'name.max' => 'Name cannot be more than :max characters.',
                        'password.min' => 'Password cannot be less than :min characters.',
                        'password.max' => 'Password cannot be more than :max characters.',
                        'scheduled_date_time.required' => 'Scheduled date time is required.',
                        'scheduled_date_time.date' => 'Scheduled date time must be a valid date.',
                        'candidates.required' => 'A candidate is required.',
                    ],
                ],
            ], 'csv' => [
                'rules' => [
                    'csv' => 'required|mimetypes:application/csvm+json,text/csv,text/csv-schema,application/vnd.ms-excel',
                ], 'messages' => [
                    'en' => [
                        'csv.required' => 'CSV file is required.',
                        'csv.mimetypes' => 'File must be a CSV.',
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