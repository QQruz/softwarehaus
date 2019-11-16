<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $approvedUser = User::create([
            'name' => 'approved',
            'email' => 'approved@user.com',
            'password' => Hash::make('password'),
            'approved' => true
        ]);

        $notApprovedUser = User::create([
            'name' => 'unapproved',
            'email' => 'unapproved@user.com',
            'password' => Hash::make('password'),
            'approved' => false
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $trashedUser = User::create([
            'name' => 'trash',
            'email' => 'trash@user.com',
            'password' => Hash::make('password'),
            'deleted_at' => date("Y-m-d H:i:s")
        ]);
    }
}
