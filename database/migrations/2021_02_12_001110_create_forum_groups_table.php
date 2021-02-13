<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateForumGroupsTable
 */
class CreateForumGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_groups', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('created_by')
                ->comment("Corresponds to the `users` table `id` column.");
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
        Schema::dropIfExists('forum_groups');
    }
}
