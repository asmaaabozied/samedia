<?php

namespace App\Repositories\Eloquent;


use App\Models\AqarService;
use App\Models\AqarSetting;
use App\Models\Category;
use App\Repositories\Interfaces\ServiceAqarRepositoryInterface as ServiceAqarRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

use Alert;

class ServiceAqarRepository implements ServiceAqarRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.services_aqars.index', [
            'title' => trans('site.services_aqars'),
            'model' => 'services_aqars',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.services_aqars.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $AqarService = AqarService::find($Id);
        $SubAqarService = AqarService::where('parent_id', $Id)->get();


        return view('dashboard.services_aqars.edit', compact('AqarService', 'SubAqarService'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $AqarService = AqarService::find($Id);
        $SubAqarService = AqarService::where('parent_id', $Id)->get();

        return view('dashboard.services_aqars.show', compact('AqarService', 'SubAqarService'));
    }


    public function store($request)
    {

        // TODO: Implement store() method.

        $request_data = $request->except(['icon', 'sub_name_ar', 'sub_name_en']);


        $AqarService = AqarService::create($request_data);

        $categories = Category::where('parent_id', '=', 1)->where('type', '=', 1)->get();
        foreach ($categories as $category) {
            AqarSetting::create([
                'detail_id' => $AqarService->id,
                'category_id' => $category->id

            ]);

        }
        $arr = $request->sub_name_ar;

        if ($arr[0]!=null) {

            foreach ($request->sub_name_ar as $key => $value) {
                AqarService::create([
                    'name_ar' => $request['sub_name_ar'][$key],
                    'name_en' => $request['sub_name_en'][$key],
                    'parent_id' => $AqarService->id
                ]);

            }


        }

        if ($request->hasFile('icon')) {

            UploadImage('images/services_aqars/', 'icon', $AqarService, $request->file('icon'));

        }


        if ($AqarService) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.services_aqars.index');

        }
    }

    public function update($AqarService, $request)
    {

        // TODO: Implement update() method.

        $request_data = $request->except(['_token', '_method', 'icon', 'sub_name_ar', 'sub_name_en']);

        $AqarService->update($request_data);
        $arr = $request->sub_name_ar;
 
        if ($request->hasFile('icon')) {

            UploadImage('images/services_aqars/', 'icon', $AqarService, $request->file('icon'));

        }

        if ($arr[0]!=null) {

            foreach ($request['sub_name_ar'] as $key => $value) {
                // AqarService::create([
                    if( $request['sub_name_ar'][$key] !=null){
                    AqarService::updateOrCreate([
                        'id' => $request['id'][$key]??0
                    ],[
                    'name_ar' => $request['sub_name_ar'][$key],
                    'name_en' => $request['sub_name_en'][$key],
                    'parent_id' => $AqarService->id
                    ]);
                }
            }


        }
      

        if ($AqarService) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.services_aqars.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.services_aqars.index');

        }
    }


    public function destroy($AqarService)
    {
        // TODO: Implement destroy() method.
        AqarSetting::where('detail_id', $AqarService->id)->delete();

        $result = $AqarService->delete();

        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }
        return back();
    }
    public function destroy2($SubAqarService)
    {
        // TODO: Implement destroy() method.
        //DeletePlaceTable
        $result = $SubAqarService->delete();

        if ($result) {
               Alert::toast('Success', __('site.deleted_successfully'));
        } else {
               Alert::toast('Error', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
