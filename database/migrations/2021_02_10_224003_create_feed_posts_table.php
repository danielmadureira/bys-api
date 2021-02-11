<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFeedPostsTable
 */
class CreateFeedPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_posts', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('author')
                ->comment("Corresponds to the `users` table `id` column.");
            $table->string('picture');
            $table->string('picture_description');
            $table->string('title');
            $table->string('headline', 100)->nullable();
            $table->text('text');
            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('author')
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
        Schema::dropIfExists('feed_posts');
    }
}
