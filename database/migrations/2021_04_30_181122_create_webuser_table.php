<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webuser', function (Blueprint $table) {
            $table->id();
			$table->string('fname');
			$table->string('lname');
			$table->string('email');
			$table->datetime('DOB')->nullable();
			$table->integer('telephone')->nullable();
			$table->string('gender', 255)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('blood', 255)->nullable();
			$table->string('symptomes', 255)->nullable();
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
        Schema::dropIfExists('webuser');
    }
}
