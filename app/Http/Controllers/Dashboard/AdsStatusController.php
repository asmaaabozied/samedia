<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\AdsStatusDataTable;
use App\Http\Controllers\Controller;

use App\Models\AdsStatus;
use App\Repositories\Interfaces\AdsStatusRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdsStatusController extends Controller
{


    private AdsStatusRepositoryInterface $adsStatusRepository;

    public function __construct(AdsStatusRepositoryInterface $adsStatusRepository)
    {
        $this->adsStatusRepository = $adsStatusRepository;
    }

    public function index(AdsStatusDataTable $adsStatusDataTable)
    {
        return $this->adsStatusRepository->getAll($adsStatusDataTable);

    }


    public function show($id)
    {
        return $this->adsStatusRepository->show($id);


    }


    public function create()
    {

        return $this->adsStatusRepository->create();


    }//end of create



    public function store(Request $request)
    {
        return $this->adsStatusRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->adsStatusRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, AdsStatus $adsStatus)
    {
        return $this->adsStatusRepository->update($adsStatus, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(AdsStatus $adsStatus)
    {

        return $this->adsStatusRepository->destroy($adsStatus);


    }//end of destroy

}
