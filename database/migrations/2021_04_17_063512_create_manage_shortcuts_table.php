<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageShortcutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_shortcuts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('s_number');
            $table->string('title',70);
            $table->string('url');
            $table->string('image_path',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_shortcuts');
    }
}
