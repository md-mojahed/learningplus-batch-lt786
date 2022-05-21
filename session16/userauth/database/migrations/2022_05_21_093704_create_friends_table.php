<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id(); // BIGINT unsigned autoincreament
            $table->string('name', 500)->default('Unknown');
            $table->integer('age')->default(0);
            $table->double('pocket_money', 8, 2)->default(5.50);
            $table->text('description')->nullable();
            $table->longText('skill')->nullable();
            $table->timestamp('create_time')->useCurrent();
            //$table->timestamps(); // created_at, updated timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
