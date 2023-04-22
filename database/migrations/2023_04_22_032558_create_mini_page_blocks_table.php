<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mini_page_blocks', function (Blueprint $table) {
            $table->id();
            $table->integer('page_block_id')->unsigned();
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('image');
            $table->integer('orders')->default(1);
            $table->foreign('page_block_id')->references('id')->on('page_blocks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_page_blocks');
    }
};
