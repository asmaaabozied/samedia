<?php

namespace App\Repositories\Eloquent;


use App\Models\Aqar;
use App\Models\User;
use App\Models\Category;
use App\Models\AnotherRoom;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\AdsStatus;
use App\Models\AqarSections;
use App\Repositories\Interfaces\AqarRepositoryInterface as AqarRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class AqarRepository implements AqarRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.aqars.index', [
            'title' => trans('site.aqars'),
            'model' => 'aqars',
            'count' => $data->count(),

        ]);
    }
    public function create()
    {
        // TODO: Implement create() method.

        $users = User::whereNotNull('type')->where('active',1)->get();
        $categories = Category::where('type',1)->where('parent_id',1)->where('active',1)->get();
        $Area = Area::where('active',1)->get();
        $countries = Country::all();
        $adsStatus = AdsStatus::all();
        $cities = City::all();

        return view('dashboard.aqars.create', compact('users', 'categories','Area', 'countries', 'cities', 'adsStatus'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $aqar = Aqar::with('aqarSection')->find($Id);   
        $aqar['changed_price']=json_decode($aqar['changed_price']);
        $users = User::whereNotNull('type')->where('active',1)->get();
        $categories = Category::where('type',1)->where('parent_id',1)->where('active',1)->get();
        $Area = Area::where('active',1)->get();
        $countries = Country::all();
        $cities = City::all();
        $adsStatus = AdsStatus::all();
        return view('dashboard.aqars.edit', compact('aqar', 'users', 'categories','Area', 'countries', 'cities', 'adsStatus'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $aqar = Aqar::find($Id);
        $aqar['changed_price']=json_decode($aqar['changed_price']);
        $users = User::whereNotNull('type')->where('active',1)->get();
        $categories = Category::where('type',1)->where('parent_id',1)->where('active',1)->get();
        $Area = Area::where('active',1)->get();
        $countries = Country::all();
        $cities = City::all();
        $adsStatus = AdsStatus::all();
        return view('dashboard.aqars.show', compact('aqar', 'users', 'categories','Area', 'countries', 'cities', 'adsStatus'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        //  return $request;

        $request_data = $request->except(['main_image','images','videos','subservice']);

        $aqar = Aqar::create($request_data);

        if ($request->hasFile('main_image')) {

            UploadImage('images/aqars/','main_image', $aqar, $request->file('main_image'));

        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $files) {
                $destinationPath = 'images/places/';
                $file_name = $_FILES['images']['name'][$key];
                $files->move($destinationPath, $file_name);
                $data[] = $_FILES['images']['name'][$key];
                $aqar->images = implode(',',$data);
                $aqar->save();
            }
        }

        if ($request->hasFile('videos')) {
                $thumbnail = $request->file('videos');
                $destinationPath = 'images/aqars/videos/';
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($destinationPath, $filename);
                $aqar->videos = $filename;
                $aqar->save();
            
            }
        foreach ($request->subservice as $subserv) {
            $arr=explode('-',$subserv);
            AqarSections::create([
                'section_id' => $arr[0],
                'sub_section_id' => $arr[1],
                'aqar_id'=>$aqar->id

            ]);
           
        }

        if ($aqar) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.aqars.index');

        }
    }

    public function update($aqar, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->except(['main_image', '_token', '_method', 'images','videos','subservice']);
        $aqar->update($request_data);


        if ($request->hasFile('main_image')) {

            UploadImage('images/aqars/','main_image', $aqar, $request->file('main_image'));
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $files) {
                $destinationPath = 'images/places/';
                $file_name = $_FILES['images']['name'][$key];
                $files->move($destinationPath, $file_name);
                $data[] = $_FILES['images']['name'][$key];
                $aqar->images = implode(',',$data);
                $aqar->save();
            }
        }
        if ($request->hasFile('videos')) {
            $thumbnail = $request->file('videos');
            $destinationPath = 'images/aqars/videos/';
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $filename);
            $aqar->videos = $filename;
            $aqar->save();
        
        }
        $services=AqarSections::where('aqar_id', $aqar->id)->get()->each(function($service){ $service->delete(); });
        foreach ($request->subservice as $subserv) {
            $arr=explode('-',$subserv);
            AqarSections::create([
                'section_id' => $arr[0],
                'sub_section_id' => $arr[1],
                'aqar_id'=>$aqar->id

            ]);
           
        }
        if ($aqar) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.aqars.index');
            session()->flash('success', __('site.updated_successfully'));
        } else {
            Alert::success('Success', __('site.update_faild'));

            return redirect()->route('dashboard.aqars.index');

        }
    }


    public function destroy($aqar)
    {
        // TODO: Implement destroy() method.
        // $result=DB::table('categories')->where('id',$category->id)->delete();
        $result = $aqar->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

          //      session()->flash('error', __('site.delete_faild'));
        }
        return back();
    }
}
