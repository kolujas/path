<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Exam;
    use Illuminate\Database\Eloquent\Model;

    class Evaluation extends Model{
        /** @var string Evaluation primary key. */
        protected $primaryKey = 'id_evaluation';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_exam', 'id_candidate', 'confirmed', 'id_status', 'logged_in', 'strikes',
        ];
        
        /**
         * * Get the Candidate who match with the foreign key.
         * @return [type]
         */
        public function candidate(){
            return $this->belongsTo(Candidate::class, 'id_candidate', 'id_candidate');
        }
        
        /**
         * * Get the Exam who match with the foreign key.
         * @return [type]
         */
        public function exam(){
            return $this->belongsTo(Exam::class, 'id_exam', 'id_exam');
        }
    }