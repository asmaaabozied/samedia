<?php

namespace App\Repositories\Eloquent;


use App\Models\Commission;
use App\Models\User;
use App\Repositories\Interfaces\CommissionRepositoryInterface as CommissionRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;

class CommissionRepository implements CommissionRepositoryInterfaceAlias
{
    public function getAll($data)
    {
//        return $data->query();
        return $data->render('dashboard.commissions.index', [
            'title' => trans('site.commissions'),
            'model' => 'commissions',
            'count' => $data->count(),
            'count1' => $data->count1(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $users = User::all();
        
        return view('dashboard.commissions.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $commission = Commission::find($Id);

        $users = User::all();
        return view('dashboard.commissions.edit', compact('commission', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $commission = Commission::find($Id);

        $users = User::all();
        return view('dashboard.commissions.show', compact('commission', 'users'));
    }

    public function store($request)
    {
        // return $request;
        $request_data = $request->all();

        // To Make User Active

        $commission = Commission::create($request_data);
        
        if ($commission) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.commissions.index');

        }
    }

    public function update($commission, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();


        $commission->update($request_data);

        if ($commission) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.commissions.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.commissions.index');

        }
    }

    public function destroy($commission)
    {
        // TODO: Implement destroy() method.

        $result = $commission->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

            //    session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}