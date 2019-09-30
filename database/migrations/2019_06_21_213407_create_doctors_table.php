<?php

use App\Models\Doctor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            Doctor::statusColumn($table);
            Doctor::positionColumn($table);
            $table->timestamps();
        });

        Schema::create('doctor_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->text('specialization')->nullable();
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->text('quote')->nullable();
            $table->text('features')->default('')->nullable();

            $table->unique(['doctor_id','locale']);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_translations');
        Schema::dropIfExists('doctors');
    }
}
