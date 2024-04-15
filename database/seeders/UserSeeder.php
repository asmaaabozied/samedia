<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $input = ['id' => 1, 'firstname'=>'admin', 'lastname'=>'admin', 'phone'=>'011111111111', 'email' => 'admin@admin.com', 'password'=>'123456789', 'role_id'=>1];
        $input['password'] = Hash::make($input['password']);
        User::create($input);
    }
}
