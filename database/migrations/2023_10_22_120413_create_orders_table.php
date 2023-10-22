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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained();
            $table->foreignId('city_id')
                ->constrained();
            $table->foreignId('address_id')
                ->constrained();
            $table->unsignedDouble('amount')->comment('Итого');
            $table->tinyInteger('status')->comment('Статус');
            $table->datetime('ordered_at')->comment('Дата заказа');
            $table->datetime('declined_at')->comment('Дата отказа')->nullable();
            $table->datetime('confirmed_at')->comment('Дата подтверждения')->nullable();
            $table->datetime('completed_at')->comment('Дата завершения')->nullable();
            $table->datetime('retrieved_at')->comment('Дата получения')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
