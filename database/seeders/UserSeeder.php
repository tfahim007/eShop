<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' =>'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'phone'=>'019999999',
            'lname'=> 'User',
            'address1'=>'27,Road abccd',
            'address2'=>'Dhanmondi',
            'city'=>'Dhaka',
            'division'=>'Dhaka',
            'country'=>'Bangladesh',
            'pincode'=>'1100',
            'role_as'=>'0',
            

        ]);
    }
}
