<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_supports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('feedback');
            $table->string('support');
            $table->string('faq');
            $table->string('privacy');
            $table->string('install');
            $table->string('uninstall');
            $table->string('eula');
            $table->string('donate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_supports');
    }
}
