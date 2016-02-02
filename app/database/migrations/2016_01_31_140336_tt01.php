<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tt01 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tt01', function($table) {
            $table->increments('idtb');
            $table->datetime('tgltb');
            $table->string('niltb');
            $table->integer("idkar")->unsigned();
            $table->timestamps();
        });

        Schema::table('tt01', function($table) {
            $table->foreign('idkar')->references('idkar')->on('mk01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tt01');
    }

}
