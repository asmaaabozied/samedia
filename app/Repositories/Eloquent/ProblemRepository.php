<?php

namespace App\Repositories\Eloquent;

use App\Models\Problem;
use App\Repositories\Interfaces\ProblemRepositoryInterface as IProblemRepositoryAlias;
use Alert;


class ProblemRepository implements IProblemRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.problems.index', [
            'title' => trans('site.problems'),
            'model' => 'problems',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.problems.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $problem = Problem::find($Id);

        return view('dashboard.problems.edit', compact('problem'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.


        $problem = Problem::find($Id);


        return view('dashboard.problems.show', compact('problem'));
    }

    public function destroy($problem)
    {
        // TODO: Implement destroy() method.

        $result = $problem->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();

        // To Make User Active

        $problem = Problem::create($request_data);





        if ($problem) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.problems.index');

        }
    }

    public function update($problem, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();


        $problem->update($request_data);





        if ($problem) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.problems.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.problems.index');

        }
    }
}
