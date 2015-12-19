<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mss_groups', function(Blueprint $table)
				{
					$table->increments('id');
					$table->timestamps();
					$table->string('name', 100);
					$table->string('description', 500);
					$table->string('password', 60);
					$table->text('user_ids');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mss_groups');
    }
}
