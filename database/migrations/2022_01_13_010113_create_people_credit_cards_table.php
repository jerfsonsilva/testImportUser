<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_credit_cards', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('number');
            $table->string('name');
            $table->string('expirationDate');
            
            $table->unsignedBigInteger('people_fk_id');
            $table->foreign('people_fk_id')->references('id')->on('people')->onDelete('cascade');

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
        Schema::dropIfExists('people_credit_cards');
    }
}
