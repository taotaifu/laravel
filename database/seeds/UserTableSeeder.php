<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    //模型工厂
		factory(\App\User::class, 30)->create();
		//修改第一个数据为正式数据
		$user = \App\User::find(1);
		$user->name = '默书彤';
		$user->email = '729589198@qq.com';
		$user->password = bcrypt('admin888');
		$user->is_admin = true;
		$user->save();

    }
}
