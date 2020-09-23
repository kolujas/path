<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateExamsTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('exams', function (Blueprint $table) {
                $table->increments('id_exam')->unique();
                $table->string('name');
                $table->text('rules')->nullable();
                $table->string('password');
                $table->date('scheduled_date_time');
                $table->string('slug');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('exams');
        }
    }