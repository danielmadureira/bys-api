<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession')->nullable();;
            $table->string('profile_picture')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type')->default('REGULAR');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'name' => "Super-User",
            'email' => "super-user@bys-app.com",
            'profession' => 'Super usuário - By Your Side',
            'password' => '$2y$10$xXpGuYCc61Ahz4BarIByi.l3EH8gB1BWoLBMBYSdkzTqJEfxqQGWW',
            'user_type' => 'ADMIN',
            'created_at' => new DateTime
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
