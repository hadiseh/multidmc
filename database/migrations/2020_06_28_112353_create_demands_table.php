<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email');
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('whats_app_account')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone_code');
            $table->string('telephone');
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('language_id');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->integer('code')->unique();
            $table->enum('status',array('active','inactive','waiting'))->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
