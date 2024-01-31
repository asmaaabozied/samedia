<?php

namespace App\Repositories\Eloquent;


use App\Models\Balance;
use App\Models\User;
use App\Repositories\Interfaces\BalanceRepositoryInterface as BalanceRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class BalanceRepository implements BalanceRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.balances.index', [
            'title' => trans('site.balances'),
            'model' => 'balances',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $users = User::all();
        return view('dashboard.balances.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $balance = Balance::find($Id);
        $users = User::all();

        return view('dashboard.balances.edit', compact('balance', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $balance = Balance::find($Id);
        $users = User::all();

        return view('dashboard.balances.show', compact('balance', 'users'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $balance = Balance::create($request_data);

        if ($balance) {
           Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.balances.index');

        }
    }

    public function update($balance, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();
        $balance->update($request_data);

        if ($balance) {
           Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.balances.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
           Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.balances.index');

        }
    }


    public function destroy($balance)
    {
        // TODO: Implement destroy() method.
//        $result=DB::table('categories')->where('id',$category->id)->delete();
        $result = $balance->delete();
        if ($result) {
               Alert::toast('Success', __('site.deleted_successfully'));
        } else {
               Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
