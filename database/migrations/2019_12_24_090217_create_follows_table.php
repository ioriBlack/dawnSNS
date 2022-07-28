<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('follow');
            $table->integer('follower');
            $table->timestamp('created_at')->useCurrent();

            // フォローを追加
            auth()->user()->follows()->attach( User::find(1) );
            // フォロワーを追加
            auth()->user()->followers()->attach( User::find(2) );

            $table->unique([
                'follow_id',
                'followed_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
