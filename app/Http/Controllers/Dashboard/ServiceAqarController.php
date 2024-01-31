<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\AqarServiceDataTable;
use App\Http\Controllers\Controller;

use App\Models\AqarService;
use Alert;

use App\Models\AqarSetting;
use App\Repositories\Interfaces\ServiceAqarRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceAqarController extends Controller
{


    private ServiceAqarRepositoryInterface $serviceAqarRepository;

    public function __construct(ServiceAqarRepositoryInterface $serviceAqarRepository)
    {
        $this->serviceAqarRepository = $serviceAqarRepository;
    }

    public function index(AqarServiceDataTable $aqarServiceDataTable)
    {

        return $this->serviceAqarRepository->getAll($aqarServiceDataTable);

    }


    public function show($id)
    {
        return $this->serviceAqarRepository->show($id);


    }


    public function create()
    {

        return $this->serviceAqarRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([
                'name_ar' => 'required',
            ]
        );


        return $this->serviceAqarRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->serviceAqarRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
    -----------------------------------------------------*/

    public function update(Request $request, $id)
    {
        $request->validate([
                'name_ar' => 'required',
            ]
        );
        $AqarService = AqarService::find($id);

        return $this->serviceAqarRepository->update($AqarService, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $AqarService = AqarService::find($id);
        $result = $AqarService->delete();
        AqarSetting::where('detail_id', $id)->delete();

        $AqarService = AqarService::where('parent_id', $id)->delete();

        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));

        } 
        
        return back();
//        return $this->serviceAqarRepository->destroy($AqarService);

    }//end of destroy

    public function destroy2($id)
    {
        $SubAqarService = AqarService::find($id);
        $result = $SubAqarService->delete();
        if ($result) {
          Alert::toast('Deleted', __('site.deleted_successfully'));
      } else {
          Alert::toast('Deleted', __('site.delete_faild'));
      }
      return back();
    }//end of destroy

}
