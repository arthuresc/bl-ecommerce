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
            $table->string('description');
            $table->decimal('price', 9, 2);
            $table->decimal('quantity', 9, 0);
            $table->decimal('minQuantity', 9, 0);
            $table->string('mainImage');
            $table->json('arrayImages')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->charset = 'utf8';
            $table->collation = "utf8_unicode_ci";
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
