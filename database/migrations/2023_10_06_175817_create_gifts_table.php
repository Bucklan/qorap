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
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description')
                ->nullable()
                ->comment('Описание');
            $table->integer('quantity')
                ->default(0)
                ->comment('Количество');
            $table->tinyInteger('type');
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->foreignId('category_id')->nullable()
                ->constrained();
            $table->foreignId('company_id')->nullable()->constrained();

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
        Schema::dropIfExists('gifts');
    }
};
