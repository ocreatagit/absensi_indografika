<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Th01 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('th01', function($table) {
            $table->increments('idhut');
            $table->datetime('tglhut');
            $table->string('jenhut');
            $table->bigInteger('nilhut');
            $table->char("flglns", 1);
            $table->integer("idkar")->unsigned();
            $table->timestamps();
        });

        Schema::table('th01', function($table) {
            $table->foreign('idkar')->references('idkar')->on('mk01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('th01');
    }

}
