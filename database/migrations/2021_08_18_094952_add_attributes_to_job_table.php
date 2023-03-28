<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {

            $table->string('title');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('description');
            $table->foreignId('city_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jobtype_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('salary')->nullable();
            $table->foreignId('salarytype_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropIfExists('jobs');
        });
    }
}
