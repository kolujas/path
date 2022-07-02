<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Module;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model {
        use Sluggable, SluggableScopeHelpers;

        /**
         * * Exam primary key.
         * @var string
         */
        protected $primaryKey = 'id_exam';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'id_user',
            'name',
            'password',
            'rules',
            'scheduled_date_time',
            'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            //
        ];

        /**
         * * Get all of the Candidates for the Exam.
         * @return \Illuminate\Support\Collection
         */
        public function candidates () {
            $candidates = collect();

            foreach ($this->evaluations as $evaluation) {
                $candidates->push(Candidate::find($evaluation->id_candidate));
            }

            return $candidates;
        }

        /**
         * * Get all of the Evaluations for the Exam.
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function evaluations () {
            return $this->hasMany(Evaluation::class, 'id_exam', 'id_exam');
        }

        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable () {
            return [
                'slug' => [
                    'source'	=> 'name',
                    'onUpdate'	=> true,
                ],
            ];
        }

        /**
         * * The validation rules & messages.
         * @var array
         */
        public static $validation = [
            'auth' => [
                'rules' => [
                    'confirmed' => 'required',
                ], 'messages' => [
                    'en' => [
                        'confirmed.required' => 'Accept the rules first.',
                    ],
                ],
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
    }