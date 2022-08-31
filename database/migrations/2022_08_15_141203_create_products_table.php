<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->mediumText('description');
            $table->float('price');
            $table->string('image_primary')->nullable();
            $table->string('image_secondary')->nullable();
            $table->string('image_ter')->nullable();
            $table->string('video_mp4')->nullable();
            $table->string('product_code')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('tax_id')->nullable()->constrained();
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
        Schema::dropIfExists('products');
    }
}
