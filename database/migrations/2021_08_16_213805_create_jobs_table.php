<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            // $table->string('title');
            // $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->text('description');
            // $table->foreignId('city_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('jobtype_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->string('salary');
            // $table->foreignId('salarytype_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->string('image');
            // $table->boolean('status')->default(1);

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
        Schema::dropIfExists('jobs');
    }
}
