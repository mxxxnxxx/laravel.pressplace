<?php

use Illuminate\Database\Seeder;

class UserTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //フェイカー　テストデータを入れた
        factory(App\User::class, 50)->create();
    }
}
