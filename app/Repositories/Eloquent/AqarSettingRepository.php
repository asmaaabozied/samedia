<?php

namespace App\Repositories\Eloquent;


use App\Models\AqarSetting;
use App\Models\Category;;
use App\Repositories\Interfaces\AqarSettingRepositoryInterface as AqarSettingRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Alert;
class AqarSettingRepository implements AqarSettingRepositoryInterfaceAlias
{
    public function getAll($data)
    {


    }

    public function create()
    {
        // TODO: Implement create() method.

       
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.
       
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

       
    }

    public function store($request)
    {
        // TODO: Implement store() method.

    }

    public function update($aqarSetting, $request)
    {
        // TODO: Implement update() method.

    }

    public function destroy($aqarSetting)
    {
        // TODO: Implement destroy() method.
        
    }

    public function editsetting()
    { 

        $details=[];
        $categories = Category::where('type',1)->where('active',1)->get();
        return view('dashboard.aqar_setting.edit', compact('categories','details'));
    }

    public function getsetting($id)
    { 
        $details = AqarSetting::join('aqar_details', 'aqar_setting.detail_id', '=', 'aqar_details.id')
        ->where('category_id',$id)->get();
        return view('dashboard.aqar_setting.table', compact('details'));
    }

    public function active_input_display($id,$check)
    { 
        $aqarSetting = AqarSetting::find($id);
        $aqarSetting =AqarSetting::where('ID', $id)->update(['display' => (int)$check]);


    }


    public function active_input_required($id,$check)
    { 
        $aqarSetting = AqarSetting::find($id);
        $aqarSetting =AqarSetting::where('ID', $id)->update(['required' => (int)$check]);

    }
}
