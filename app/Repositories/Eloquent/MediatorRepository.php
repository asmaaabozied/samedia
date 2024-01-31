<?php

namespace App\Repositories\Eloquent;

use App\Models\Mediator;
use App\Repositories\Interfaces\MediatorRepositoryInterface as IMediatorRepositoryAlias;
use Alert;


class MediatorRepository implements IMediatorRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.mediators.index', [
            'title' => trans('site.mediators'),
            'model' => 'mediators',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.mediators.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $mediator = Mediator::find($Id);

        return view('dashboard.mediators.edit', compact('mediator'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.


        $mediator = Mediator::find($Id);


        return view('dashboard.mediators.show', compact('mediator'));
    }

    public function destroy($mediator)
    {
        // TODO: Implement destroy() method.

        $result = $mediator->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Deleted', __('site.delete_faild'));

        }

        return back();
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();

        // To Make User Active

        $mediator = Mediator::create($request_data);





        if ($mediator) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.mediators.index');

        }
    }

    public function update($mediator, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();


        $mediator->update($request_data);





        if ($mediator) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.mediators.index');
        } else {
            Alert::success('Success', __('site.update_faild'));

            return redirect()->route('dashboard.mediators.index');

        }
    }
}
