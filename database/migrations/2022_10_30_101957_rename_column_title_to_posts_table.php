<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Переименовать поле
            $table->renameColumn('content', 'rename_content');
            //изменить тип данных
            //$table->string('column')->change();
            //Для удаления таблицы Schema::dropIfExists('table_name')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('rename_content', 'content');
        });
    }
};
