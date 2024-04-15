<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = ['website_content','languages','menu','contacts',
    'sliders','teams','projects','services','settings', 'permissions', 'users'
        ];

        DB::table('roles')->delete();

        $maps = ['create', 'update', 'read', 'delete'];

        $permissions = array();

        foreach ($models as $model) {
            foreach ($maps as $map) {
                array_push($permissions, $map . '_' . $model);
            }
        }

        $langs = ['id' => 1,'name'=>'admin', 'display_name'=>'admin'];

        $data = Role::create($langs);
        $all_permissions = array_merge($permissions, []);
        $data->syncPermissions($all_permissions);

    }
}
