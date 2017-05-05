<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fw_users')->insert([
            'username' => 'maxshabl',
            'email' => 'maxshabl@yandex.ru',
            'password' => md5('12345'),
            'auth_token' => md5('12345'),
            'created_at' => time(),
            'updated_at' => time()+300,
            'status' => 1
        ]);
    }
}
