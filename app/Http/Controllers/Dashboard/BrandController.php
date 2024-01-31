<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;

use App\Models\Ads;
use App\Models\CarBrand;
use App\Repositories\Interfaces\AdvertisingRepositoryInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{


    private BrandRepositoryInterface $BrandRepository;

    public function __construct(BrandRepositoryInterface $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    public function index(BrandDataTable $brandDataTable)
    {

//        return Ads::all();
        return $this->BrandRepository->getAll($brandDataTable);

    }


    public function show($id)
    {
        return $this->BrandRepository->show($id);


    }


    public function create()
    {

        return $this->BrandRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'name' => 'required',

            ]
        );


        return $this->BrandRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->BrandRepository->edit($id);


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

                'name' => 'required',

            ]
        );
        $brand = CarBrand::find($id);

        return $this->BrandRepository->update($brand, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $brand = CarBrand::find($id);

        return $this->BrandRepository->destroy($brand);


    }//end of destroy

}
