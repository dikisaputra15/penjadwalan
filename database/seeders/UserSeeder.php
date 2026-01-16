<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> hash::make('admin12345'),
               'roles'=>'admin',
            ],
            [
               'name'=>'Staff',
               'email'=>'staff@gmail.com',
               'password'=> hash::make('staff12345'),
               'roles'=> 'staff',
            ],
            [
                'name'=>'Pegawai',
                'email'=>'pegawai@gmail.com',
                'password'=> hash::make('pegawai12345'),
                'roles'=> 'pegawai',
             ],
             [
                'name'=>'Kepala DPP',
                'email'=>'kepala@gmail.com',
                'password'=> hash::make('kepala12345'),
                'roles'=> 'kepala',
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
