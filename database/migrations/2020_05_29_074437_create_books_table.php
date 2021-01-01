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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
            $table->longText('description');
            $table->string('picture');
            $table->string('pdf');
            $table->biginteger('published_by');
            $table->integer('download')->default('0');
            $table->float('review')->default('0');
            $table->integer('read')->default('0');
            $table->timestamps();

           
            
            // $table->foreign('published_by')->references('id')->on('users'); 

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
