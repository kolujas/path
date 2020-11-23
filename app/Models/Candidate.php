<?php
    namespace App\Models;

    use App\Models\Evaluation;
    use App\Models\Module;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;

    class Candidate extends Authenticatable{
        use HasApiTokens, Notifiable, Sluggable, SluggableScopeHelpers;

        /** @var string User primary key. */
        protected $primaryKey = 'id_candidate';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'candidate_number', 'full_name', 'date_of_birth', 'id_member', 'member', 'modules', 'file', '->id_candidate', 'slug',
        ];

        /** @var array The attributes to hidde. */
        protected $hidden = [
            'remember_token',
        ];

        /**
         * * Get all the Evaluations who match with the primary key.
         * @return [type]
         */
        public function evaluations(){
            return $this->hasMany(Evaluation::class, 'id_candidate', 'id_candidate');
        }

        /**
         * * Create and returns the Candidate modules.
         * @return [type]
         */
        public function modules(){
            $auxData = explode(',', $this->modules);
            $modules = collect([]);
            foreach ($auxData as $module) {
                $modules->push((object)Module::$array[$module]);
            }
            return $modules;
        }
        
        /** @var array The validation rules & messages. */
        public static $validation = [
            'create' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:candidates',
                    'full_name' => 'nullable|min:2|max:60',
                    'date_of_birth' => 'nullable|date',
                    'id_member' => 'nullable|numeric',
                    'modules' => 'required',
                ], 'messages' => [
                    'en' => [
                        'candidate_number.required' => 'Candidate Number is required.',
                        'candidate_number.numeric' => 'Candidate Number must be numeric.',
                        'candidate_number.unique' => 'Candidate Number has already been assigned.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Memeber ID is required.',
                        'id_member.numeric' => 'Memeber ID must be numeric.',
                        'modules.required' => 'A Module must be selected.',
                    ],
                ],
            ],'edit' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:candidates,candidate_number,{id_candidate},id_candidate',
                    'full_name' => 'nullable|min:2|max:60',
                    
                    'date_of_birth' => 'nullable|date',
                    'id_member' => 'nullable|numeric',
                    'modules' => 'required',
                ], 'messages' => [
                    'en' => [
                        'candidate_number.required' => 'Candidate Number is required.',
                        'candidate_number.numeric' => 'Candidate Number must be numeric.',
                        'candidate_number.unique' => 'Candidate Number has already been assigned.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Memeber ID is required.',
                        'id_member.numeric' => 'Memeber ID must be numeric.',
                        'modules.required' => 'A Module must be selected.',
                    ],
                ],
            ],'csv' => [
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
                    'source'	=> 'full_name',
                    'onUpdate'	=> true,
                ]
            ];
        }
    }