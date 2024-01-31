<?php

namespace App\Repositories\Eloquent;


use App\Models\Ads;
use App\Models\User;
use App\Repositories\Interfaces\AdvertisingRepositoryInterface as AdvertisingRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;

class AdvertisingRepository implements AdvertisingRepositoryInterfaceAlias
{
    public function getAll($data)
    {


       
    //    return $data->query();

        return $data->render('dashboard.advertisings.index', [
            'title' => trans('site.advertising'),
            'model' => 'ads',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.
        $users = User::get();

        return view('dashboard.advertisings.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $advertising = Ads::find($Id);
        $users = User::get();


        return view('dashboard.advertisings.edit', compact('advertising', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $advertising = Ads::find($Id);
        $users = User::get();


        return view('dashboard.advertisings.show', compact('advertising', 'users'));
    }


    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->except(['ads_image']);

        // To Make  Active
        $request_data['show_ads'] = 1;

        $advertising = Ads::create($request_data);

        if ($request->hasFile('ads_image')) {
//            $thumbnail = $request->file('ads_image');
//            $destinationPath = 'images/advertising/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $advertising->ads_image = $filename;
//            $advertising->save();

            UploadImage('images/advertisings/','ads_image', $advertising, $request->file('ads_image'));

        }

        if ($advertising) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.advertisings.index');

        }
    }

    public function update($advertising, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->except(['ads_image', '_token', '_method']);
        $advertising->update($request_data);


        if ($request->hasFile('ads_image')) {
//            $thumbnail = $request->file('ads_image');
//            $destinationPath = 'images/advertising/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $advertising->ads_image = $filename;
//            $advertising->save();
            UploadImage('images/advertisings/','ads_image', $advertising, $request->file('ads_image'));
        }


        if ($advertising) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.advertisings.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
            Alert::error('Success', __('site.update_faild'));

            return redirect()->route('dashboard.advertisings.index');

        }
    }


    public function destroy($advertising)
    {
        // TODO: Implement destroy() method.
//        $result=DB::table('categories')->where('id',$category->id)->delete();
        $result = $advertising->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));

        }

        return back();
    }
}
