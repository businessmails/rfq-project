<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = [
            [
                'name' => 'admin',
                'display_name' => 'Super Admin',
                'description' => 'Super Admin',
                'created_at' => '2019-07-01 01:35:44',
                'updated_at' => '2019-07-01 01:35:44',
            ],
            [
                'name' => 'seller',
                'display_name' => 'seller',
                'description' => 'seller',
                'created_at' => '2019-07-01 01:35:44',
                'updated_at' => '2019-07-01 01:35:44',
            ],
            [
                'name' => 'buyer',
                'display_name' => 'buyer',
                'description' => 'buyer',
                'created_at' => '2019-07-01 01:35:44',
                'updated_at' => '2019-07-01 01:35:44',
            ],
           
        ];

        DB::table('roles')->insert($records);
    }
}
