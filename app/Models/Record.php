<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Illuminate\Database\Eloquent\Model;
    use Storage;

    class Record extends Model {
        /**
         * * Record primary key.
         * @var string
         */
        protected $primaryKey = 'id_record';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'id_evaluation', 'folder',
        ];

        /**
         * * Get all of the Candidate for the Record.
         * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
         */
        public function candidate () {
            return Candidate::find($this->evaluation->id_candidate);
        }

        /**
         * * Get the Evaluation who match with the foreign key.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function evaluation () {
            return $this->belongsTo(Evaluation::class, 'id_evaluation', 'id_evaluation');
        }

        /**
         * * Get all of the Exam for the Record.
         * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
         */
        public function exam ($withOutCandidates = false) {
            $exam = Exam::find($this->evaluation->id_exam);

            if (!$withOutCandidates) {
                $exam->candidates = $exam->candidates();
            }

            return $exam;
        }

        /**
         * * Get the files from the folder.
         * @return \Illuminate\Support\Collection
         */
        public function files () {
            $this->files = collect();

            foreach (Storage::disk('local')->allfiles($this->folder) as $file) {
                $this->files->push($file);
            }

            return $this->files;
        }

        /**
         * * The validation rules & messages.
         * @var array
         */
        public static $validation = [
            'create' => [
                'rules' => [
                    'strikes' => 'required',
                ], 'messages' => [
                    'en' => [
                        'strikes.required' => 'The strikes are required.',
                    ],
                ],
            ],
        ];
    }