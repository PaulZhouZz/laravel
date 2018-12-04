<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用factory工厂模式批量添加数据
        factory(App\Models\Users::class, 50)->create();
    }
}
