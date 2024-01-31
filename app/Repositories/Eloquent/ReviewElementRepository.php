<?php

namespace App\Repositories\Eloquent;


use App\Models\ReviewElement;
use App\Repositories\Interfaces\ReviewElementRepositoryInterface as ReviewElementRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class ReviewElementRepository implements ReviewElementRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.reviewElements.index', [
            'title' => trans('site.reviewElements'),
            'model' => 'reviewElements',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.reviewElements.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $reviewElement = ReviewElement::find($Id);

        return view('dashboard.reviewElements.edit', compact('reviewElement'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.


        $reviewElement = ReviewElement::find($Id);


        return view('dashboard.reviewElements.show', compact('reviewElement'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->except(['icon']);

        // To Make  Active

        $reviewElement = ReviewElement::create($request_data);

        if ($request->hasFile('icon')) {
//            $thumbnail = $request->file('icon');
//            $destinationPath = 'images/places/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $place->display_photo = $filename;
//            $place->save();
            UploadImage('images/reviewElements/','icon', $reviewElement, $request->file('icon'));

        }

        if ($reviewElement) {
           Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.reviewElements.index');

        }
    }

    public function update($reviewElement, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->except(['icon', '_token', '_method']);
        $reviewElement->update($request_data);


        if ($request->hasFile('icon')) {
//            $thumbnail = $request->file('icon');
//            $destinationPath = 'images/places/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $place->icon = $filename;
//            $place->save();
            UploadImage('images/reviewElements/','icon', $reviewElement, $request->file('icon'));

        }     
        if ($reviewElement) {
           Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.reviewElements.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
           Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.reviewElements.index');

        }
    }


    public function destroy($reviewElement)
    {
        // TODO: Implement destroy() method.
        $result = $reviewElement->delete();
        if ($result) {
               Alert::toast('Success', __('site.deleted_successfully'));
        } else {
               Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
