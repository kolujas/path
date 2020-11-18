<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Illuminate\Database\Eloquent\Model;

    class Record extends Model{
        /** @var string Record primary key. */
        protected $primaryKey = 'id_record';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_evaluation', 'file',
        ];
        
        /**
         * * Get the Evaluation who match with the foreign key.
         * @return [type]
         */
        public function evaluation(){
            return $this->belongsTo(Evaluation::class, 'id_evaluation', 'id_evaluation');
        }

        /**
         * * Create and returns the Record Candidate.
         * @return [type]
         */
        public function candidate(){
            dd($this);
            return Candidate::find($this->evaluation->id_candidate);
        }

        /**
         * * Create and returns the Record Exam.
         * @return [type]
         */
        public function exam(){
            $exam = Exam::find($this->evaluation->id_exam);
            $exam->candidates = $exam->candidates();
            return $exam;
        }
        
        /** @var array The validation rules & messages. */
        public static $validation = [
            'create' => [
                'rules' => [
                    'strikes' => 'required',
                ], 'messages' => [
                    'en' => [
                        'strikes.required' => 'The Strikes are required.',
                    ],
                ],
            ],
        ];
    }