<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface as ICountryRepositoryAlias;
use Alert;

use Intervention\Image\Facades\Image;

class CountryRepository implements ICountryRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.countries.index', [
            'title' => trans('site.countries'),
            'model' => 'countries',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.countries.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $country = Country::find($Id);

        return view('dashboard.countries.edit', compact('country'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.


        $country = Country::find($Id);


        return view('dashboard.countries.show', compact('country'));
    }

    public function destroy($country)
    {
        // TODO: Implement destroy() method.

        $result = $country->delete();
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

        $request_data = $request->except(['image','flag_image']);

        // To Make User Active
        // $request_data['active'] = 1;

        $country = Country::create($request_data);


        if ($request->hasFile('image')) {
//            $thumbnail = $request->file('image');
//            $destinationPath = 'images/countries/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $country->image = $filename;
//            $country->save();
            UploadImage('images/countries/','image', $country, $request->file('image'));

        }
        if ($request->hasFile('flag_image')) {
//            $thumbnail = $request->file('flag_image');
//            $destinationPath = 'images/countries/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $country->flag_image = $filename;
//            $country->save();
            UploadImage('images/countries/','flag_image', $country, $request->file('flag_image'));
        }


        if ($country) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.countries.index');

        }
    }

    public function update($country, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->except(['image','flag_image']);


        $country->update($request_data);


        if ($request->hasFile('image')) {
//            $thumbnail = $request->file('image');
//            $destinationPath = 'images/countries/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $country->image = $filename;
//            $country->save();
            UploadImage('images/countries/','image', $country, $request->file('image'));
        }

        if ($request->hasFile('flag_image')) {
//            $thumbnail = $request->file('flag_image');
//            $destinationPath = 'images/countries/';
//            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
//            $thumbnail->move($destinationPath, $filename);
//            $country->flag_image = $filename;
//            $country->save();
            UploadImage('images/countries/','flag_image', $country, $request->file('flag_image'));

        }


        if ($country) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.countries.index');
        } else {
            Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.countries.index');

        }
    }
}
