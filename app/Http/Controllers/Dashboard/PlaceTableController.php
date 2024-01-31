<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PlaceTableDataTable;
use App\Http\Controllers\Controller;

use App\Models\PlaceTable;
use App\Repositories\Interfaces\PlaceTableRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlaceTableController extends Controller
{


    private PlaceTableRepositoryInterface $placeTableRepository;

    public function __construct(PlaceTableRepositoryInterface $placeTableRepository)
    {
        $this->placeTableRepository = $placeTableRepository;
    }

    public function index(placeTableDataTable $placeTableDataTable)
    {
        return $this->placeTableRepository->getAll($placeTableDataTable);

    }


    public function show($id)
    {
        return $this->placeTableRepository->show($id);


    }


    public function create()
    {

        return $this->placeTableRepository->create();


    }//end of create



    public function store(Request $request)
    {
        $request->validate([

            'name_ar', // required
            'name_en', // nullable
            ]
        );


        return $this->placeTableRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->placeTableRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, PlaceTable $placeTable)
    {
        $request->validate([

            'name_ar', // required
            'name_en', // nullable
            ]
        );

        return $this->placeTableRepository->update($placeTable, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(PlaceTable $placeTable)
    {

        return $this->placeTableRepository->destroy($placeTable);


    }//end of destroy

}
