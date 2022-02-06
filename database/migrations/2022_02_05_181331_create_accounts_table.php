<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->bigInteger('user_id')->comment('id пользователя');
            $table->integer('family_member_id')->nullable()->comment('id члена семьи');
            $table->string('name')->default('')->comment('Имя');
            $table->bigInteger('balance')->default(0)->comment('Баланс');
            $table->integer('currency')->nullable()->comment('Валюта');
            $table->string('description')->default('')->comment('Описание');
            $table->index('user_id');
            $table->index('family_member_id');
            $table->index('currency');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE accounts comment 'Счета'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
