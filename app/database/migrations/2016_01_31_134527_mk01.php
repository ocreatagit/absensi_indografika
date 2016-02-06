<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mk01 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('mk01', function($table) {
            $table->increments('idkar');
            $table->integer('abscd');
            $table->string('nama');
            $table->string('usernm');
            $table->string('email');
            $table->string('passwd');
            $table->date('ttl');
            $table->text('addr1');
            $table->tinyInteger("status");
            $table->text('pic');
            $table->bigInteger('tbsld');
            $table->bigInteger('htsld');
            $table->integer('idjb')->unsigned();
            $table->timestamps();
        });

        Schema::table('mk01', function($table) {
            $table->foreign('idjb')->references('idjb')->on('mj01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('mk01');
    }

}
