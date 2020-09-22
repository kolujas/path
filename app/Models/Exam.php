<?php
    namespace App\Models;
    
    use App\Models\Student;
    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model{
        /** @var string Exam primary key. */
        protected $primaryKey = 'id_exam';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'rules', 'password', 'scheduled_date_time',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
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
                    ], 'es' => [
                        'accept.required' => 'Accepta las reglas y coindiciones primero.',
                        'ID.required' => 'El DNI es obligatorio.',
                        'ID.min' => 'El DNI debe ser formato JPG/JPEG, o PNG.',
                    ],
                ]
            ], 
        ];
    }