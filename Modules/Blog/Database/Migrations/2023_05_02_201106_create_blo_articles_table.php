<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blo_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->binary('content_text', 16777215);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('label_id')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('blo_articles');
    }
};
