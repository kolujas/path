<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCandidateTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('candidates', function (Blueprint $table) {
                $table->increments('id_candidate')->unique();
                $table->bigInteger('candidate_number')->unique();
                $table->string('full_name');
                $table->string('email')->unique();
                $table->date('date_of_birth')->nullable();
                $table->bigInteger('id_member')->unique()->nullable();
                $table->text('member')->nullable();
                $table->string('modules');
                $table->string('file')->nullable();
                $table->string('password')->nullable();
                $table->string('slug');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('candidate');
        }
    }