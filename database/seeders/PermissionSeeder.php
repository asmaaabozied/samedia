<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = ['users','settings','roles',' message','contacts','countries','cities','questions','problems','mediators','advertising','reviewElements','categories','cars','bookings','car_comments','car_reviews','aquarcategories','areas','services_aqars','aqars','aquarbooking','aqar_comments','aqar_reviews',
        'place_categories','places','place_comments','place_reviews','ads_status','booking_status','commissions','notifications','balances','invoices','deposits','sections'
        ];



        $maps = ['create', 'update', 'read', 'delete'];

        foreach ($models as $model) {


            foreach ($maps as $map) {

                Permission::create([

                    'name' => $map . '_' . $model,
                    'display_name' => $map . '_' . $model,
                    'description' => $map . '_' . $model
                ]);

            }
        }
    }
}
