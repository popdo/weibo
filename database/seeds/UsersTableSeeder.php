<?php

use App\Models\User;
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
        DB::table('users')->truncate();//先清空表
        factory(User::class,30)->create();//再创建30个用户
        // 对第一个用户进行修改
        User::find(1)->update([
            'name' => 'jim',
            'email' => 'bme@qq.com',
            'password' => bcrypt('111111'),
            'is_admin' => true
        ]);
    }
}
