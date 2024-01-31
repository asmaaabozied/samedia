<?php

namespace App\Repositories\Eloquent;


use App\Models\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface as ISectionRepositoryAlias;
use Illuminate\Support\Facades\Auth;

use Alert;

class SectionRepository implements ISectionRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.sections.index', [
            'title' => trans('site.sections'),
            'model' => 'sections',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.sections.create');
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
        $data = Section::find($data);

        return view('dashboard.sections.edit',compact('data'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $data = Section::find($Id);

        return view('dashboard.sections.show',compact('data'));
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


        return redirect()->route('dashboard.sections.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $data = Section::create($request_data);


        if ($data) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.sections.index');

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

        return redirect()->route('dashboard.sections.index');
    }
}
