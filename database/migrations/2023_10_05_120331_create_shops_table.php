<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->unsignedTinyInteger('number_of_stores')->default(1);
            $table->json('social_link')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('address_id')->nullable()->constrained('addresses');
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
        Schema::dropIfExists('shops');
    }
};