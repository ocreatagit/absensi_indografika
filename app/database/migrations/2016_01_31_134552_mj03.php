<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mj03 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mj03', function($table) {
            $table->integer('idjk')->unsigned();
            $table->integer('idkar')->unsigned();
            $table->timestamps();
        });

        Schema::table('mj03', function($table) {
            $table->foreign('idjk')->references('idjk')->on('mj02');
            $table->foreign('idkar')->references('idkar')->on('mk01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('mj03');
    }

}
