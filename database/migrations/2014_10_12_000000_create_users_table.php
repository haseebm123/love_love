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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('mid_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('preferred_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('education')->nullable();
            $table->string('gender')->nullable();
            $table->string('account_for_id')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable()->default('user');
            $table->string('profile')->nullable()->default('default.png');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('status')->default(0);
            $table->string('reference_link')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->longText('about')->nullable();
            $table->tinyInteger('verified_by_number')->nullable()->default(0);
            $table->integer('otp')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('is_block')->nullable()->default(0);
            $table->integer('forget_password_code')->nullable();
            $table->string('role_id')->nullable()->default('user');
            $table->string('automation')->nullable()->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
