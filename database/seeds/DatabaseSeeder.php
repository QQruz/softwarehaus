<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminSeeder::class);

        // you can comment out these
        $this->call(UsersTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}
