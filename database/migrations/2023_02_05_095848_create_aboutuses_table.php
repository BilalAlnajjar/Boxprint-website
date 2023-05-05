<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string("title_who_are")->nullable();
            $table->string("title_our_vision")->nullable();
            $table->string("title_our_message")->nullable();
            $table->text("description_who_are")->nullable();
            $table->text("description_our_vision")->nullable();
            $table->text("description_our_message")->nullable();
            $table->text("image_who_are");
            $table->text("image_our_vision")->nullable();
            $table->text("image_our_message")->nullable();

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
        Schema::dropIfExists('aboutuses');
    }
};
