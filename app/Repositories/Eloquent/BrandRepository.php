<?php

namespace App\Repositories\Eloquent;


use App\Models\CarBrand;
use App\Repositories\Interfaces\BrandRepositoryInterface as BrandRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;

class BrandRepository implements BrandRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.brands.index', [
            'title' => trans('site.brands'),
            'model' => 'brands',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.brands.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $brand=CarBrand::find($Id);



        return view('dashboard.brands.edit', compact('brand'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $brand=CarBrand::find($Id);




        return view('dashboard.brands.show', compact('brand'));
    }


    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->except(['logo']);

        // To Make  Active

        $brand = CarBrand::create($request_data);

        if ($request->hasFile('logo')) {
            $thumbnail = $request->file('logo');
            $destinationPath = 'images/brands/';
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $filename);
            $brand->logo = $filename;
            $brand->save();
        }

        if ($brand) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.brands.index');

        }
    }

    public function update($brand, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->except(['logo','_token','_method']);
        $brand->update($request_data);


        if ($request->hasFile('logo')) {
            $thumbnail = $request->file('ads_image');
            $destinationPath = 'images/brands/';
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $filename);
            $brand->logo = $filename;
            $brand->save();
        }


        if ($brand) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.brands.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.brands.index');

        }
    }


    public function destroy($brand)
    {
        // TODO: Implement destroy() method.
        $result = $brand->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
