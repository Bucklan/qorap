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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('short_description')->nullable();
            $table->integer('quantity')->nullable()->default(0); //poka shto
            $table->tinyInteger('type')->nullable()->default(1);//poka shto
            $table->unsignedInteger('price')->nullable();//poka shto
            $table->unsignedInteger('old_price')->nullable();
            $table->foreignId('shop_id')->nullable()->constrained('shops');
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
        Schema::dropIfExists('products');
    }
};
