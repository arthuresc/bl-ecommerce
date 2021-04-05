<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
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
        Schema::dropIfExists('tag_types');
    }
}
