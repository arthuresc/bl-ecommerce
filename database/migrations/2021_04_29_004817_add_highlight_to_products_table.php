<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHighlightToProductsTable extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('highlight');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('highlight');
        });
    }
}
