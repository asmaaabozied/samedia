<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\City;
use App\Repositories\Interfaces\PlaceCategoryRepositoryInterface as PlaceCategoryRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;

class PlaceCategoryRepository implements PlaceCategoryRepositoryInterfaceAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.places.place_categories.index', [
            'title' => trans('site.place_categories'),
            'model' => 'categories',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $cities = City::all();

        return view('dashboard.places.place_categories.create', compact('cities'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $category = Category::find($Id);

        $citiesrelated = json_decode($category->city_id) ?? [];

        //    return $citiesrelated;

        $subcategories = Category::where('parent_id', $Id)->get();

        $cities = City::all();

        return view('dashboard.places.place_categories.edit', compact('category', 'subcategories', 'cities', 'citiesrelated'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $category = Category::find($Id);

        $subcategories = Category::where('parent_id', $Id)->get();

        $cities = City::all();

        $citiesrelated = json_decode($category->city_id) ?? [];


        return view('dashboard.places.place_categories.show', compact('category', 'subcategories', 'cities', 'citiesrelated'));
    }


    public function store($request)
    {
        // TODO: Implement store() method.

        //        return $request;
        $request_data = $request->except(['image', 'icon','name_ar_category','name_en_category','image_category', 'city_id']);

        // To Make  Active
        $request_data['active'] = 1;
        $request_data['type'] = 0;
        $request_data['parent_id'] = null;
        $arr = $request->name_ar_category;

//        ['city_id' => json_encode($request['city_id'])

        $category = Category::create($request_data);


        if ($request->hasFile('image')) {

            UploadImage('images/categories/', 'image', $category, $request->file('image'));

        }

        if ($request->hasFile('icon')) {

            UploadImage('images/categories/', 'icon', $category, $request->file('icon'));

        }

        if ($arr[0]!=null) {

        // if (!empty($request['name_ar_category'])) {

            foreach ($request['name_ar_category'] as $key => $value) {
                $cat = Category::create([
                    'name_ar' => $request['name_ar_category'][$key],
                    'name_en' => $request['name_en_category'][$key],
                    'type' =>  $request['type'] = 0,
                    'parent_id' => $category->id,
//                    'city_id' => json_encode($request['city_id'])
                ]);


                if (!empty($request['image_category'][$key])) {

                $image = $request['image_category'][$key] ?? '';

                $destinationPath = 'images/categories/';
                $extension = $image->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                $image->move($destinationPath, $name); // uploading file to given
                $cat->image = $name;

                $cat->save();

            }
        }

        }
        if ($category) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.place_categories.index');

        }
    }

    public function update($category, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->except(['image', 'icon','name_ar_category','name_en_category','image_category', 'city_id']);

        $category->update($request_data);

        $arr = $request->name_ar_category;

        if ($request->hasFile('image')) {

            UploadImage('images/categories/', 'image', $category, $request->file('image'));
        }


        if ($request->hasFile('icon')) {

            UploadImage('images/categories/', 'icon', $category, $request->file('icon'));
        }
          //  return $request;
        // if ($arr[0]!=null) {

            if ($arr[0]!=null) {

            foreach ($request['name_ar_category'] as $key => $value) {
                
                if( $request['name_ar_category'][$key] !=null){

                $cat = Category::updateOrCreate([
                        'id' => $request['id'][$key]??0
                    ],[
                    'name_ar' => $request['name_ar_category'][$key],
                    'name_en' => $request['name_en_category'][$key],
                    'type' =>  $request['type'] = 0,
                    'parent_id' => $category->id,
//                    'city_id' => json_encode($request['city_id'])
                ]);


                if (!empty($request['image_category'][$key])) {

                    $image = $request['image_category'][$key] ?? '';


                    $destinationPath = 'images/categories/';
                    $extension = $image->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                    $image->move($destinationPath, $name); // uploading file to given
                    $cat->image = $name;

                    $cat->save();

                }
            }
        }
    }
        if ($category) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.place_categories.index');
        } else {
            Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.place_categories.index');

        }
    }


    public function destroy($category)
    {
        // TODO: Implement destroy() method.
        $result = $category->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));

        }

        return back();
    }

}
