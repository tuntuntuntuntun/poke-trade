<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        foreach (range(1,4) as $num) {
            DB::table('users')->insert([
                'name' => "test{$num}",
                'email' => "test{$num}@test.com",
                'password' => bcrypt('testtest'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
