<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

            ['name'=> 'imran', 'email' => 'imran@gmail.com', 'password' => '123456'],
            ['name'=> 'khan', 'email' => 'khan@gmail.com', 'password' => '123456'],
            ['name'=> 'korim', 'email' => 'korim@gmail.com', 'password' => '123456'],
            ['name'=> 'rohim', 'email' => 'rohim@gmail.com', 'password' => '123456'],
        ];

        User::insert($users);
    }
}
