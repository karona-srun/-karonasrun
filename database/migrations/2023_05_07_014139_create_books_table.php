<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sievphow_books', function (Blueprint $table) {
            $table->id();
            $table->string("title_kh");
            $table->string("title_en");
            $table->bigInteger("book_categories_id");
            $table->tinyInteger('favorite')->nullable();
            $table->string("publisher");
            $table->string("author");
            $table->longText('short_description_kh');
            $table->longText('short_description_en');
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('audio')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
