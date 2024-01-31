<?php

namespace App\Repositories\Eloquent;


use App\Models\Pool;
use App\Repositories\Interfaces\PoolRepositoryInterface as IPoolRepositoryAlias;
use Illuminate\Support\Facades\Auth;

use Alert;

class PoolRepository implements IPoolRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.pools.index', [
            'title' => trans('site.pools'),
            'model' => 'pools',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.pools.create');
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
        $data = Pool::find($data);

        return view('dashboard.pools.edit',compact('data'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $data = Pool::find($Id);

        return view('dashboard.pools.show',compact('data'));
    }

    public function destroy($data)
    {
        // TODO: Implement destroy() method.


        $result = $data->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }


        return redirect()->route('dashboard.pools.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $data = Pool::create($request_data);


        if ($data) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.pools.index');

        }
    }

    public function update($data, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();

        $data->update($request_data);


        if ($data) {
            Alert::success('Success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }

        return redirect()->route('dashboard.pools.index');
    }
}
