<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 生成数据集合
        $users = factory(User::class)
                        ->times(10)
                        ->make();
                        

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Alex';
        $user->email_verified_at = now();
        $user->email = 'alex@example.com';
        // $user-password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();
    }
}
