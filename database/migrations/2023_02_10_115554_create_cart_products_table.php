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
        Schema::create('cart_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cart_id');
            $table->text("image_logo")->nullable();
            $table->text("image_content")->nullable();
            $table->string("company_name")->nullable();
            $table->text("image_design")->nullable();
            $table->json("measuring")->nullable();
            $table->json("papers")->nullable();
            $table->json("weights")->nullable();
            $table->string("numbers")->nullable();
            $table->json("cutLabels")->nullable();
            $table->json("colors")->nullable();
            $table->json("number_pages")->nullable();
            $table->json("input_number")->nullable();
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
            $table->string("width")->nullable();
            $table->string("height")->nullable();
            $table->string("phone")->nullable();
            $table->string("website")->nullable();
            $table->string("email")->nullable();
            $table->text("social_media_details")->nullable();
            $table->text("more_details")->nullable();
            $table->enum('type',['print','design'])->default('design');
            $table->double('price');
            $table->timestamps();

            $table->primary(['cart_id','product_id']);;

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_products');
    }
};
