<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id_user')->unique();
                $table->bigInteger('candidate_number')->unique()->null();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password')->null();
                $table->date('date_of_birth')->null();
                $table->tinyInteger('level')->null();
                $table->bigInteger('id_member')->unique()->null();
                $table->text('member')->null();
                $table->tinyInteger('id_level')->default(1);
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
            Schema::dropIfExists('users');
        }
    }