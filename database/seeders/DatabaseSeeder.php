<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('roles')->insert([
            [ 'name' => 'Администратор' ]
        ]);
        DB::table('permissions')->insert([
            [ 'name' => 'view-user', 'label' => 'Просмотр пользователей' ],
            [ 'name' => 'create-user', 'label' => 'Добавление пользователей' ],
            [ 'name' => 'update-user', 'label' => 'Изменение пользователей' ],
            [ 'name' => 'delete-user', 'label' => 'Удаление пользователей' ],

        ]);
        DB::table('users')->insert([
            [ 'name' => 'Admin', 'active' => 1, 'email' => 'admin@email.net', 'password' => bcrypt('password'), 'role_id' => 1 ]
        ]);
    }
}
