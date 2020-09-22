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
                $table->bigInteger('candidate_number')->unique()->nullable();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password')->nullable();
                $table->date('date_of_birth')->nullable();
                $table->tinyInteger('level')->nullable();
                $table->bigInteger('id_member')->unique()->nullable();
                $table->text('member')->nullable();
                $table->tinyInteger('id_role')->default(1);
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