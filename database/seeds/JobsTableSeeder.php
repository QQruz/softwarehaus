<?php

use Illuminate\Database\Seeder;
use App\Job;
use App\User;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::query()->forceDelete();

        $approvedUser = User::where('approved', true)->first();
        $notApprovedUser = User::where('approved', false)->first();

        Job::create([
            'title' => 'Approved job 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Approved job 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Approved job 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Not approved job',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $notApprovedUser->id
        ]);

        Job::create([
            'title' => 'Spam job',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $notApprovedUser->id,
            'deleted_at' => date("Y-m-d H:i:s")
        ]);
    }
}
