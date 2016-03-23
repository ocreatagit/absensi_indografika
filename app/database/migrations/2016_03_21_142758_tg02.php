<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tg02 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tg02', function($table) {
            $table->increments('id');
            $table->integer("mg01_id")->unsigned();
            $table->foreign('mg01_id')->references('idgj')->on('mg01');
            $table->integer('jmtgh');
            $table->integer('nmlgj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tg01');
    }
}
