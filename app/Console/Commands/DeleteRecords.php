<?php
    namespace App\Console\Commands;

    use App\Mail\NotifyRecordMail;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Record;
    use Auth;
    use Carbon\Carbon;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Mail;
    use Storage;

    class DeleteRecords extends Command{
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'record:delete';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Delete the Record who has a week old';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle(){
            $records = Record::all();
            $evaluations = collect([]);
            $candidates = collect([]);
            foreach ($records as $record) {
                if(Carbon::parse($record->updated_at)->addDay(7)->toDateTimeString() > Carbon::now()->toDateTimeString()){
                    $evaluations->push($record->id_evaluation);
                    if(isset($record->file) && !empty($record->file)) {
                        Storage::delete($record->file);
                    }
                    $record->delete();
                }
            }
            foreach ($evaluations as $id_evaluation) {
                if($evaluation = Evaluation::find($id_evaluation)){
                    $candidates->push($evaluation->id_candidate);
                    $evaluation->delete();
                }
            }
            foreach ($candidates as $id_candidate) {
                if($candidate = Candidate::find($id_candidate)){
                    $candidate->delete();
                }
            }

            Mail::to('receiver@mail.com')->send(new NotifyRecordMail());
        }
    }