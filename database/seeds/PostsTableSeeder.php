<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wants = ['ヒトカゲ', 'ヒヒダルマ', 'ドラパルト'];
        $gives = ['メッソン', 'エースバーン', 'コイキング'];

        foreach (array_map(null, $wants, $gives) as [$want, $give]) {
            DB::table('posts')->insert([
                'want' => $want,
                'give' => $give,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }


}