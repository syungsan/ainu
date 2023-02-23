<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {

            $table->id();
            $table->boolean("ainu01_enable")->default(true);
            $table->boolean("ainu02_enable")->default(false);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $date = new DateTime();
            $date = $date->sub(new DateInterval('P1Y1M1D'))->format("Y-m-d");
            $table->date("ainu01_access_date")->default($date);
            $table->integer("ainu01_total_quiz_point")->default(0);
            $table->integer("ainu01_practice_count")->default(0);
            $table->string("ainu01_cognomen")->default("初心者ぺー");
            $table->integer("ainu02_total_quiz_point")->default(0);
            $table->integer("ainu02_practice_count")->default(0);
            $table->string("ainu02_cognomen")->default("初心者ぺー");

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
        Schema::dropIfExists('statuses');

        Schema::table('scores', function (Blueprint $table) {
            //
            $table->dropForeign('scores_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
