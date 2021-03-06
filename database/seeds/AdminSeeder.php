<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->forceDelete();

        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => env('MAIL_ADMIN', 'admin@admin.com'),
            'password' => Hash::make('password'),
            'approved' => true
        ]);

        $adminRole->users()->attach($admin);
    }
}
