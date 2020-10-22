<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class UpdateExamsScheduledDateTime extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('exams', function (Blueprint $table){
                $table->string('scheduled_date_time')->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            //
        }
    }