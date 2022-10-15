<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'cool_word';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cool_word_tag', function (Blueprint $table) {
            $table->foreignId('cool_word_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('cool_word_tag');
    }
};
