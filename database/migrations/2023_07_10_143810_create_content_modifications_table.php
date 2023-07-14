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
        Schema::create('content_modifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->longText('term_and_condition')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('help_support')->nullable();
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
        Schema::dropIfExists('content_modifications');
    }
};
