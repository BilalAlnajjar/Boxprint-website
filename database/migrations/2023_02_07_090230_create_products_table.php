<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('price')->default(0);
            $table->string('price_display')->default(0);
            $table->string('timeDelivery')->nullable();
            $table->json("measure")->nullable();
            $table->json("paper")->nullable();
            $table->json("weights")->nullable();
            $table->json("numbers")->nullable();
            $table->json("number_pages")->nullable();
            $table->json("input_number")->nullable();
            $table->json("cutLabels")->nullable();
            $table->json("colors")->nullable();
            $table->json("print_faces")->nullable();
            $table->json("assembly_type")->nullable();
            $table->json("open_note")->nullable();
            $table->json("sinuses")->nullable();
            $table->json("thermal_packaging")->nullable();
            $table->json("number_creases")->nullable();
            $table->json("edges")->nullable();
            $table->json("cover_thickness")->nullable();
            $table->json("sticker")->nullable();
            $table->json("structure")->nullable();
            $table->json("box")->nullable();
            $table->json("base")->nullable();
            $table->json("tape_color")->nullable();
            $table->text('images');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
