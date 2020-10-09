<?php
    namespace App\Models;

    use App\Models\Module;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;

    class Candidate extends Authenticatable{
        use HasApiTokens, Notifiable;

        /** @var string User primary key. */
        protected $primaryKey = 'id_candidate';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'candidate_number', 'full_name', 'email', 'date_of_birth', 'level', 'id_member', 'member', 'modules', 'file', 'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password',
        ];

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
                    'candidate_number' => 'required|numeric|unique:users',
                    'full_name' => 'nullable|min:2|max:60',
                    'email' => 'required|email|unique:users',
                    'date_of_birth' => 'nullable|date',
                    'id_member' => 'nullable|numeric|unique:users',
                    'modules' => 'required',
                ], 'messages' => [
                    'en' => [
                        'candidate_number.required' => 'Candidate Number is required.',
                        'candidate_number.numeric' => 'Candidate Number must be numeric.',
                        'candidate_number.unique' => 'Candidate Number it\'s used.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'email.required' => 'Email is required.',
                        'email.email' => 'Email must be a valid mail (example@mail.com).',
                        'email.unique' => 'Email it\'s used.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Memeber ID is required.',
                        'id_member.numeric' => 'Memeber ID must be numeric.',
                        'id_member.unique' => 'Memeber ID it\'s used.',
                        'modules.required' => 'A Module must be selected.',
                    ],
                ],
            ],'edit' => [
                'rules' => [
                    'candidate_number' => 'required|numeric|unique:users',
                    'full_name' => 'nullable|min:2|max:60',
                    'email' => 'required|email|unique:users',
                    'date_of_birth' => 'nullable|date',
                    'id_member' => 'nullable|numeric|unique:users',
                    'modules' => 'required',
                ], 'messages' => [
                    'en' => [
                        'candidate_number.required' => 'Candidate Number is required.',
                        'candidate_number.numeric' => 'Candidate Number must be numeric.',
                        'candidate_number.unique' => 'Candidate Number it\'s used.',
                        'full_name.min' => 'Full name cannot be less than :min characters.',
                        'full_name.max' => 'Full name cannot be more than :max characters.',
                        'email.required' => 'Email is required.',
                        'email.email' => 'Email must be a valid mail (example@mail.com).',
                        'email.unique' => 'Email it\'s used.',
                        'date_of_birth.date' => 'Date of birth must be a valid date (1999-05-24).',
                        'id_member.required' => 'Memeber ID is required.',
                        'id_member.numeric' => 'Memeber ID must be numeric.',
                        'id_member.unique' => 'Memeber ID it\'s used.',
                        'modules.required' => 'A Module must be selected.',
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