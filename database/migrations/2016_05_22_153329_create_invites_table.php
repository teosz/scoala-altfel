<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('invites', function(Blueprint $table) {
				$table->increments('id')->unsigned();
				$table->integer('role')->unsigned();
				$table->text('code', 255);
				$table->string('email');
				$table->string('name');
				$table->date('expiration');
				$table->boolean('used')->default(False);
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
		Schema::table('invites', function($table) {
			$table->drop();
		});
	}

}
