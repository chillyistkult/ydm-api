<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
    }
}

class UserTableSeeder extends Seeder {

    public function run() {
        User::truncate();

        User::create( [
            'username' => 'Developer',
            'password' => 'Developer',
        ] );
    }
}
