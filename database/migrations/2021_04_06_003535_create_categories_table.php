 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            
            $table->timestamps();
            $table->softDeletes();

            $table->charset = 'utf8';
            $table->collation = "utf8_unicode_ci";
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
