<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('url')->nullable();
            $table->integer('type')->default(1);
            $table->date('date');
            $table->string('name');
            $table->string('anons', 4000);
            $table->string('image')->nullable();
            $table->text('text');
            $table->integer('show')->default('0');
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
        Schema::dropIfExists('company_news');
    }
}
