<?php

namespace App\Repositories\Eloquent;

use App\Models\Area;
use App\Models\City;
use App\Repositories\Interfaces\AreaRepositoryInterface as IAreaRepositoryAlias;
use Alert;


class AreaRepository implements IAreaRepositoryAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.areas.index', [
            'title' => trans('site.areas'),
            'model' => 'areas',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $cities = City::all();
        return view('dashboard.areas.create', compact('cities'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $area = Area::find($Id);

        $cities = City::all();
        return view('dashboard.areas.edit', compact('area', 'cities'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $area = Area::find($Id);

        $cities = City::all();
        return view('dashboard.areas.show', compact('area', 'cities'));
    }


    public function store($request)
    {

        $request_data = $request->all();
        $area = Area::create($request_data);

        if ($area) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.areas.index');

        }
    }

    public function update($area, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();


        $area->update($request_data);

        if ($area) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.areas.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.areas.index');

        }
    }


    public function destroy($area)
    {
        // TODO: Implement destroy() method.
        $result = $area->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

        }

        return back();
    }
}
