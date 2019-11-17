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
            'title' => 'Job by approved user 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Job by approved user 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Job by approved user 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $approvedUser->id
        ]);

        Job::create([
            'title' => 'Waiting for moderation',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'email' => 'test@test.com',
            'user_id' => $notApprovedUser->id
        ]);
    }
}
