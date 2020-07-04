<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Kodir Zaelani',
            'email'     => 'admin@zaelani.id',
            'password'  => bcrypt('password')
        ]);
    }
}
