<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->tinyInteger('status')->default('0')->nullable();;
            $table->tinyInteger('popular')->default('0')->nullable();;
            $table->string('image')->nullable();;
            $table->string('meta_title')->nullable();;
            $table->string('meta_descrip')->nullable();;
            $table->string('meta_keywords')->nullable();;
            $table->timestamps();
            $table->softDeletes('deleted_at','0');
        });
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
