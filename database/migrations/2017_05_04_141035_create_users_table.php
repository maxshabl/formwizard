<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up() {
        Schema::create("fw_users", function($table) {
            $table->increments("id");
            $table->string("username");
            $table->string("email");
            $table->string("password");
            $table->string("auth_token");
            $table->smallInteger("status");
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop("users");
    }
}