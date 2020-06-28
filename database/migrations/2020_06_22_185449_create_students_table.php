<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 20)->nullable(false);
            $table->string('surnames', 40)->nullable(false);
            $table->date('birthdate')->nullable(false);
            $table->string('city', 40)->nullable(true);
            
            $table->unsignedBigInteger('school_id')->nullable(true);
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('students');
    }
}