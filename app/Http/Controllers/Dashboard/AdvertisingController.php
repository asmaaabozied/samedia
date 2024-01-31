<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AdsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Ads;
use App\Repositories\Interfaces\AdvertisingRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdvertisingController extends Controller
{


    private AdvertisingRepositoryInterface $AdvertisingRepository;

    public function __construct(AdvertisingRepositoryInterface $AdvertisingRepository)
    {
        $this->AdvertisingRepository = $AdvertisingRepository;
    }

    public function index(AdsDataTable $AdvertisingDataTable)
    {

//        return Ads::all();
        return $this->AdvertisingRepository->getAll($AdvertisingDataTable);

    }


    public function show($id)
    {
        return $this->AdvertisingRepository->show($id);


    }


    public function create()
    {

        return $this->AdvertisingRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'title' => 'required',

            ]
        );


        return $this->AdvertisingRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->AdvertisingRepository->edit($id);


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

                'title' => 'required',

            ]
        );
        $ads = Ads::find($id);

        return $this->AdvertisingRepository->update($ads, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $ads = Ads::find($id);

        return $this->AdvertisingRepository->destroy($ads);


    }//end of destroy

}
