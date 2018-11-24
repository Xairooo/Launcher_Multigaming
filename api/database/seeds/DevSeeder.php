<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            [
                'name' => 'Laravel Password Grant Client DEV',
                'secret' => 'KfaPYR9hpXUUOkanmDDO3SEPY9Dwbh2Kxjc6zwTo',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0
            ]
        ]);


        \App\User::create([
            'email' => 'root@root.com',
            'password' => bcrypt('root'),
            'name' => 'Root'
        ]);
    }
}
