<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ta02 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ta02', function($table) {
            $table->integer('idabs')->unsigned();
            $table->integer('idkar')->unsigned();
            $table->datetime("tglmsk");
            $table->tinyInteger("abscd");
            $table->timestamps();
        });

        Schema::table('ta02', function($table) {
            $table->foreign('idabs')->references('idabs')->on('ta01');
            $table->foreign('idkar')->references('idkar')->on('mk01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ta02');
    }

}
