<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Exam;
    use Illuminate\Database\Eloquent\Model;

    class Evaluation extends Model {
        /**
         * * Evaluation primary key.
         * @var string
         */
        protected $primaryKey = 'id_evaluation';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'answers',
            'confirmed',
            'id_candidate',
            'id_exam',
            'id_status',
            'logged_in',
            'strikes',
        ];

        /**
         * * Get the Candidate that owns the Evaluation.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function candidate () {
            return $this->belongsTo(Candidate::class, 'id_candidate', 'id_candidate');
        }

        /**
         * * Get the Exam that owns the Evaluation.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function exam () {
            return $this->belongsTo(Exam::class, 'id_exam', 'id_exam');
        }
    }