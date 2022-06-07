<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hekmatinasser\Verta\Verta;
use App\Models\category;
class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->unique();
            $table->string('mah');
            $table->string('sal');
            $table->timestamps();
        });
        category::create([
           'mah' => verta()->format('%B'),
           'sal' => verta()->format('Y'),
           'category' => verta()->format('Y-m')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
