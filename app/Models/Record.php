<?php
    namespace App\Models;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Illuminate\Database\Eloquent\Model;
    use Storage;

    class Record extends Model{
        /** @var string Record primary key. */
        protected $primaryKey = 'id_record';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id_evaluation', 'folder',
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
            return Candidate::find($this->evaluation->id_candidate);
        }

        /**
         * * Create and returns the Record Exam.
         * @return [type]
         */
        public function exam($withOutCandidates = false){
            $exam = Exam::find($this->evaluation->id_exam);
            if (!$withOutCandidates) {
                $exam->candidates = $exam->candidates();
            }
            return $exam;
        }
        
        /**
         * * Get the files from the folder.
         * @return [type]
         */
        public function files(){
            $this->files = collect([]);
            foreach (Storage::disk('local')->allfiles($this->folder) as $file) {
                $this->files->push($file);
                // foreach ($this->candidate()->modules() as $module) {
                //     $name = explode('/', $file);
                //     $name = explode('.', end($name))[0];
                //     $fileName = preg_replace("/\+/", "", preg_replace("/-/", "", preg_replace("/ /", "_", $module->folder)));
                //     if ("$fileName-$module->initials" == $name) {
                //         $module->url = $name;
                //         $module->file = $file;
                //         $this->files->push($module);
                //     }
                // }
            }
            return $this->files;
        }
        
        /** @var array The validation rules & messages. */
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