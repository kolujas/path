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

    class Candidate extends Authenticatable {
        use HasApiTokens, Notifiable, Sluggable, SluggableScopeHelpers;

        /**
         * * User primary key.
         * @var string
         */
        protected $primaryKey = 'id_candidate';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'candidate_number',
            'date_of_birth',
            'full_name',
            'id_candidate',
            'id_member',
            'id_user',
            'member',
            'modules',
            'slug',
        ];

        /**
         * * The attributes to hidde.
         * @var array
         */
        protected $hidden = [
            'remember_token',
        ];

        /**
         * * Get all of the Evaluations for the Candidate.
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function evaluations () {
            return $this->hasMany(Evaluation::class, 'id_candidate', 'id_candidate');
        }

        /**
         * * Get all of the Modules for the Candidate.
         * @return \Illuminate\Support\Collection
         */
        public function modules () {
            $auxData = explode(',', $this->modules);
            $modules = collect();

            foreach ($auxData as $module) {
                $modules->push((object) Module::$array[$module]);
            }

            return $modules;
        }

        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable () {
            return [
                'slug' => [
                    'source'	=> 'full_name',
                    'onUpdate'	=> true,
                ],
            ];
        }

        /**
         * * Returns the Candidate by the candidate_number.
         * @static
         * @param \Illuminate\Database\Eloquent\Builder  $query
         * @param int $id_location
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public static function scopeNumber ($query, $candidate_number) {
            return $query->where('candidate_number', $candidate_number)->first();
        }

        /**
         * * The validation rules & messages.
         * @var array
         */
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
                        'candidate_number.required' => 'Candidate number is required.',
                        'candidate_number.numeric' => 'Candidate number must be numeric.',
                        'candidate_number.unique' => 'Candidate number has already been assigned.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Member ID is required.',
                        'id_member.numeric' => 'Member ID must be numeric.',
                        'modules.required' => 'A module must be selected.',
                    ],
                ],
            ], 'edit' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:candidates,candidate_number,{id_candidate},id_candidate',
                    'full_name' => 'nullable|min:2|max:60',
                    'date_of_birth' => 'nullable|date',
                    'id_member' => 'nullable|numeric',
                    'modules' => 'required',
                ], 'messages' => [
                    'en' => [
                        'candidate_number.required' => 'Candidate number is required.',
                        'candidate_number.numeric' => 'Candidate number must be numeric.',
                        'candidate_number.unique' => 'Candidate number has already been assigned.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Member ID is required.',
                        'id_member.numeric' => 'Member ID must be numeric.',
                        'modules.required' => 'A module must be selected.',
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