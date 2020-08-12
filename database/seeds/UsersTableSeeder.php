<?php

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
        factory(\App\User::class)->createMany([
            [
                'name' => 'Fidan Ademi',
                'username' => 'fidan',
                'email' => 'fidomax07@gmail.com'
            ],
            [
                'name' => 'Valon Shala',
                'username' => 'valon',
                'email' => 'valonsh101@gmail.com'
            ],
            [
                'name' => 'Kujtim Halipi',
                'username' => 'kujtim',
                'email' => 'kujtimm@gmail.com'
            ],
        ]);

        factory(\App\Follower::class)->createMany([
            [
                'user_id' => 1,
                'following_id' => 1
            ],
            [
                'user_id' => 1,
                'following_id' => 2
            ],
            [
                'user_id' => 1,
                'following_id' => 3
            ],
            [
                'user_id' => 2,
                'following_id' => 1
            ],
            [
                'user_id' => 3,
                'following_id' => 1
            ],
        ]);
    }
}
