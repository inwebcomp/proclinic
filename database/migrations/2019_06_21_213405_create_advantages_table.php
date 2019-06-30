<?php

use App\Models\Advantage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvantagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advantages', function (Blueprint $table) {
            $table->increments('id');
            Advantage::statusColumn($table);
            Advantage::positionColumn($table);
            $table->timestamps();
        });

        Schema::create('advantage_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advantage_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['advantage_id','locale']);
            $table->foreign('advantage_id')->references('id')->on('advantages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advantage_translations');
        Schema::dropIfExists('advantages');
    }
}
