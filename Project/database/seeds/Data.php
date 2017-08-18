<?php

use Illuminate\Database\Seeder;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_user')->insert([
            'user_id' => 'admin',
            'user_name' => 'Admin',
            'login_pwd' => 'admin',
            'acc_lock_flg' => '0',
            'delete_flg' => '0',
        ]);

        DB::table('tbl_group')->insert([
            'group_cd' => 'G01',
            'group_name' => 'Quản lý',
        ]);
        DB::table('tbl_group')->insert([
            'group_cd' => 'G02',
            'group_name' => 'Lễ Tân',
        ]);
        DB::table('tbl_group')->insert([
            'group_cd' => 'G03',
            'group_name' => 'Kế toán',
        ]);

        DB::table('tbl_user_group')->insert([
            'user_id' => 'admin',
            'group_cd' => 'G01',
        ]);
    }
}
