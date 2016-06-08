<?php

use Illuminate\Database\Seeder;
use App\Enums\UserType;
class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            [
                'name'      => 'Admin',
                'email'      => 'super@admin.com',
                'password'  => Hash::make('123123'),
                'user_type' => UserType::SuperAdmin
            ]
        ]);
    }
}
