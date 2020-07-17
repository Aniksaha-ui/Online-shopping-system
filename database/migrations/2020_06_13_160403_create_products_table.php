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
            $table->bigIncrements('id');
          $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('catagories')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('s_id')->unsigned();
            $table->foreign('s_id')->references('id')->on('subs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('p_name',100);
            $table->string('slug',100);
            $table->integer('p_price');
            $table->integer('p_quan');
            $table->integer('p_alert');
            $table->string('p_image')->default('image.png');
            $table->text('p_des');
            $table->text('p_summary');
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
