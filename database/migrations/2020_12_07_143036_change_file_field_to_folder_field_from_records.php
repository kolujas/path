<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class ChangeFileFieldToFolderFieldFromRecords extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('records', function (Blueprint $table) {
                $table->renameColumn('file', 'folder');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::table('records', function (Blueprint $table) {
                //
            });
        }
    }