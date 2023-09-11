<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SomeColumnsToSievphowBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sievphow_books', function (Blueprint $table) {
            $table->decimal('price', 9, 2)->nullable();
            $table->tinyInteger('is_enabled')->nullable()->comment('1 or true is enabled');
            $table->tinyInteger('is_free')->nullable()->comment('1 or true is free');
            $table->string('pdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sievphow_books', function (Blueprint $table) {
            $table->dropColumn('price')->after('audio'); 
            $table->dropColumn('is_enabled')->after('price'); 
            $table->dropColumn('is_free')->after('is_free'); 
            $table->dropColumn('pdf')->after('pdf'); 
        });
    }
}
