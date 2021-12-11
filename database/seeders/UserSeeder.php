<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $predef = new User();

        $predef->name = 'Raaif Rasheed';
        $predef->email = 'raaifrasheed@gmail.com';
        $predef->email_verified_at = now();
        $predef->password = Hash::make('Raaif@123');
        $predef->remarks = 'deafault user';

        $predef->save();

        //generate mass data
        User::factory()->count(50)->create()->each(function ($user) {
            $user->save();
        });
    }
}
