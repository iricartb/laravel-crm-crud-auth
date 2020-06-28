<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 40)->unique()->nullable(false);
            $table->string('address', 60)->nullable(false);
            $table->string('logo', 40)->nullable(true);
            $table->string('email', 40)->unique()->nullable(true);
            $table->string('phone', 15)->unique()->nullable(true);
            $table->string('web', 40)->nullable(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('schools');
    }
}