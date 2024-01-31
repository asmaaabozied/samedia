<?php

namespace App\Repositories\Eloquent;

use App\Models\PlaceTable;
use App\Repositories\Interfaces\PlaceTableRepositoryInterface as IPlaceTableRepositoryAlias;
use Alert;


class PlaceTableRepository implements IPlaceTableRepositoryAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.place_tables.index', [
            'title' => trans('site.place_tables'),
            'model' => 'place_tables',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('dashboard.place_tables.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $placeTable = PlaceTable::find($Id);

        return view('dashboard.place_tables.edit', compact('placeTable'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $placeTable = PlaceTable::find($Id);
        return view('dashboard.place_tables.show', compact('placeTable'));
    }


    public function store($request)
    {

        $request_data = $request->all();
        $placeTable = PlaceTable::create($request_data);

        if ($placeTable) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.place_tables.index');

        }
    }

    public function update($placeTable, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();


        $placeTable->update($request_data);

        if ($placeTable) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.place_tables.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.place_tables.index');

        }
    }


    public function destroy($placeTable)
    {
        // TODO: Implement destroy() method.
        $result = $placeTable->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

        }

        return back();
    }
}
