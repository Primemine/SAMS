<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->id();
            $table->string('index_no');
            $table->string('full_name');
            $table->string('sex');
            $table->string('registration_no');
            $table->string('reg_no')->nullable();
            $table->string('collage');
            $table->string('course');
            $table->string('yos');
            $table->string('account_number')->nullable();
            $table->double('ma');
            $table->double('books_stationary');
            $table->double('tution_free');
            $table->double('field');
            $table->double('research');
            $table->double('srf');
            $table->double('total');
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
        Schema::dropIfExists('allocations');
    }
}
