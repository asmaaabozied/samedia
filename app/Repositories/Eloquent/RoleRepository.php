<?php

namespace App\Repositories\Eloquent;

use App\DataTables\RolesDataTable;
use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface as IRoleRepositoryAlias;
use Illuminate\Support\Facades\Auth;

use Alert;

class RoleRepository implements IRoleRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.roles.index', [
            'title' => trans('site.roles'),
            'model' => 'roles',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        $models = ['users','settings','roles',' message','contacts','countries','cities','questions','problems','mediators','advertising','reviewElements','categories','cars','bookings','car_comments','car_reviews','aquarcategories','areas','services_aqars','aqars','aquarbooking','aqar_comments','aqar_reviews',
        'place_categories','places','place_comments','place_reviews','ads_status','booking_status','commissions','notifications','balances','invoices','deposits','sections'
        ];
        $maps = ['create', 'update', 'read', 'delete'];


        return view('dashboard.roles.create', compact('models', 'maps'));
    }

    public function edit($role)
    {
        // TODO: Implement edit() method.

        $models = ['users','settings','roles',' message','contacts','countries','cities','questions','problems','mediators','advertising','reviewElements','categories','cars','bookings','car_comments','car_reviews','aquarcategories','areas','services_aqars','aqars','aquarbooking','aqar_comments','aqar_reviews',
        'place_categories','places','place_comments','place_reviews','ads_status','booking_status','commissions','notifications','balances','invoices','deposits','sections'
        ];

        $maps = ['create', 'update', 'read', 'delete'];


        return view('dashboard.roles.edit', compact('role', 'models', 'maps'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
    }

    public function destroy($role)
    {
        // TODO: Implement destroy() method.


        $result = $role->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }


        return redirect()->route('dashboard.roles.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->except('permissions');
        $role = role::create($request_data);

        if ($request->has('permissions')) {
            $all_permissions = array_merge($request->permissions, []);
            $role->syncPermissions($all_permissions);

        }
        if ($role) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.roles.index');

        }
    }

    public function update($role, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->except('permissions');

        $role->update($request_data);

        if ($request->has('permissions')) {
            $all_permissions = array_merge($request->permissions, []);
            $role->syncPermissions($all_permissions);

        }
        if ($role) {
            Alert::success('Success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }

        return redirect()->route('dashboard.roles.index');
    }
}
