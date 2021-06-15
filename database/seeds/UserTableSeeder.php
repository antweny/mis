<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'it@tgnp.or.tz',
            'email_verified_at' => now(),
            'password' => Hash::make('P@ssw0rd1'),
        ]);

        $user->assignRole('superAdmin');
    }
}
