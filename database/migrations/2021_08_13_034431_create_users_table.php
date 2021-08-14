<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->String('name', 45);
            $table->String('lastname', 45);
            $table->String('email', 45);
            
            $table->unsignedBigInteger('document_type_id')->unique();
            $table->foreign('document_type_id')->references('id')->on('document_type')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('genders_id')->unique();
            $table->foreign('genders_id')->references('id')->on('genders')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('cities_id')->unique();
            $table->foreign('cities_id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');

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
}
