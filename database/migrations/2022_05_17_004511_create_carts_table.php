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
        Schema::create('carts', function (Blueprint $table) {
            $table->id()->index(); //auto incrementのprimary keyの設定
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('item_id')->constrained('items');
            $table->integer('quantity')->length(10);
            $table->timestamps(); //create_atとupdate_atカラムが作成される
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
