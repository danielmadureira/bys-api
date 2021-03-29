<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserMoodsTable
 */
class CreateUserMoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_moods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('emoji_hex');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });

        $date = new DateTime;
        DB::table('user_moods')->insert([
            'user_id' => 1,
            'emoji_hex' => "128512",
            'description' => "Me sentindo incrível!",
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_moods');
    }
}
