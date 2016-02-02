<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mg02 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up() {
        Schema::create('mg02', function($table) {
            $table->integer('idkar')->unsigned();
            $table->integer('idgj')->unsigned();
            $table->timestamps();
        });

        Schema::table('mg02', function($table) {
            $table->foreign('idkar')->references('idkar')->on('mk01');
            $table->foreign('idgj')->references('idgj')->on('mg01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('mg02');
    }

}
