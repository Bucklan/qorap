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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('gender')->nullable()->comment('Пол');
            $table->integer('year_of_birth')->nullable()->comment('Год рождения');
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('login_blocked_at')->nullable()->comment('Время блокировки');
            $table->dateTime('password_changed_at')->nullable()->comment('Последнее изменение пароля');
            $table->softDeletes();
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
