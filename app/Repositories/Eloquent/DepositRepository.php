<?php

namespace App\Repositories\Eloquent;


use App\Models\Deposit;
use App\Models\User;
use App\Models\AqarBooking;
use App\Models\CarBooking;
use App\Repositories\Interfaces\DepositRepositoryInterface as DepositRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class DepositRepository implements DepositRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.deposits.index', [
            'title' => trans('site.deposits'),
            'model' => 'deposits',
            'count' => $data->count(),
            'count1' => $data->count1(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $users = User::all();
        $aqarbookings = AqarBooking::all();
        $carbookings = CarBooking::all();
        return view('dashboard.deposits.create', compact('users','aqarbookings','carbookings'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $Deposit = Deposit::find($Id);
        $users = User::all();
        $aqarbookings = AqarBooking::all();
        $carbookings = CarBooking::all();
        return view('dashboard.deposits.edit', compact('Deposit', 'users', 'aqarbookings', 'carbookings'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $Deposit = Deposit::find($Id);
        $users = User::all();
        $aqarbookings = AqarBooking::all();
        $carbookings = CarBooking::all();

        return view('dashboard.deposits.show', compact('Deposit', 'users', 'aqarbookings', 'carbookings'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $Deposit = Deposit::create($request_data);

        if ($Deposit) {
           Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.deposits.index');

        }
    }

    public function update($Deposit, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();
        $Deposit->update($request_data);

        if ($Deposit) {
           Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.deposits.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
           Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.deposits.index');

        }
    }


    public function destroy($Deposit)
    {
        // TODO: Implement destroy() method.
//        $result=DB::table('categories')->where('id',$category->id)->delete();
        $result = $Deposit->delete();
        if ($result) {
               Alert::toast('Success', __('site.deleted_successfully'));
        } else {
               Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
