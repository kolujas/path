<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddEvaluationsIdStatus extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('evaluations', function (Blueprint $table){
                $table->integer('id_status')->default(0);
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