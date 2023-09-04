<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSvgIcon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admin_icons')) {
            Schema::create('admin_icons', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->comment('Name');
                $table->text('icon')->comment('Icon');
                $table->unsignedTinyInteger('type')->default(0)->comment('Type');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('admin_icons');
    }
}
