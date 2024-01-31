<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\AqarSettingDataTable;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\AqarSetting;
use App\Repositories\Interfaces\AqarSettingRepositoryInterface;
use App\Repositories\Eloquent\AqarSettingRepository;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AqarSettingController extends Controller
{


    protected $AqarSettingRepository;
 
    public function __construct()
    {
        $this->AqarSettingRepository=new AqarSettingRepository();
    }

    public function index(AqarSettingDataTable $AqarSettingDataTable)
    {

        return $this->AqarSettingRepository->getAll($AqarSettingDataTable);

    }


    public function show($id)
    {
        return $this->AqarSettingRepository->show($id);


    }


    public function create()
    {

        return $this->AqarSettingRepository->create();


    }//end of create


    public function store(Request $request)
    {
        
        return $this->AqarSettingRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->AqarSettingRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    {
        $AqarSetting = AqarSetting::find($id);
        return $this->AqarSettingRepository->update($AqarSetting, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $Aqar =AqarSetting::find($id);

        return $this->AqarSettingRepository->destroy($Aqar);


    }//end of destroy


    // public function getsetting($id)
    // { 
    //     $aqarsetting = AqarSetting::where('category_id',$id)->where('display',1)->get();
    //     return  $aqarsetting;
    // }

    public function editsetting()
    { 
        return $this->AqarSettingRepository->editsetting();
    }

    public function getsetting($id)
    { 
        return $this->AqarSettingRepository->getsetting($id);
    }


    public function active_input_display($id,$check)
    { 
        return $this->AqarSettingRepository->active_input_display($id,$check);
    }


    public function active_input_required($id,$check)
    { 
        return $this->AqarSettingRepository->active_input_required($id,$check);
    }

}
