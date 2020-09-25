<?php
    namespace App\Models;

    use App\Models\Evaluation;
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
    }