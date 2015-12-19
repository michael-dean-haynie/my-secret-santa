<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('mss_items', function(Blueprint $table){
				 $table->increments('id');
				 $table->timestamps();
				 $table->integer('user_id');
				 $table->string('name', 500);
				 $table->string('specifications', 500);
				 $table->string('link', 500);
				 $table->integer('rank');
				 $table->string('reserved_by')->default('none');
			 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('mss_items');
    }
}
