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
        $user = DB::table('users')->first();

        $wants = ['ヒトカゲ', 'ヒヒダルマ', 'ドラパルト', 'ダルマッカ'];
        $gives = ['メッソン', 'エースバーン', 'コイキング', 'ドラメシヤ'];

        foreach (array_map(null, $wants, $gives) as [$want, $give]) {
            DB::table('posts')->insert([
                'user_id' => $user->id,
                'want' => $want,
                'give' => $give,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => '4v以上求む'
            ]);
        }
    }


}