<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersRolesPermissions extends Migration {

public function up()
	{
		Schema::create('roles', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',55);

		});
		Schema::create('permissions', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',55);

		});
		

		# Pivot Table of users_roles
		Schema::create('users_roles', function($table){

			$table->engine = 'InnoDB';

			$table->integer('user_id')->unsigned();
			$table->integer('role_id')->unsigned();
		
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

		});
		
		# Pivot Table of roles_permissions
		Schema::create('roles_permissions', function($table){

			$table->engine = 'InnoDB';
			
			$table->integer('role_id')->unsigned();
			$table->integer('permission_id')->unsigned();
				
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');

		});
	}


	public function down()
	{
		Schema::table('roles_permissions', function($table)
		{
		
			$table->dropForeign('roles_permissions_permission_id_foreign');
			$table->dropForeign('roles_permissions_role_id_foreign');

		});
		Schema::table('users_roles', function($table)
		{
		
			$table->dropForeign('users_roles_role_id_foreign');
			$table->dropForeign('users_roles_user_id_foreign');

		});

		Schema::drop('users_roles');
		Schema::drop('roles_permissions');
		Schema::drop('permissions');
		Schema::drop('roles');

	}

}
