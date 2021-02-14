<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateForumRoomsTable
 */
class CreateForumRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_rooms', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('created_by')
                ->comment("Corresponds to the `users` table `id` column.");
            $table->foreignId('forum_group_id')->constrained();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('created_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_rooms');
    }
}
