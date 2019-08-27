<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = new User();
        $record->name = 'admin';
        $record->email = 'admin@gmail.com';
        $record->password = Hash::make(123456);
        $record->save();

        $member = Role::where('name', '=', 'admin')->first();
        $record->attachRole($member);
    }
}
