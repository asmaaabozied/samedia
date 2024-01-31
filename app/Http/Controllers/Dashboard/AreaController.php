<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\AreaDataTable;
use App\Http\Controllers\Controller;

use App\Models\Area;
use App\Repositories\Interfaces\AreaRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{


    private AreaRepositoryInterface $areaRepository;

    public function __construct(AreaRepositoryInterface $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    public function index(AreaDataTable $areaDataTable)
    {
        return $this->areaRepository->getAll($areaDataTable);

    }


    public function show($id)
    {
        return $this->areaRepository->show($id);


    }


    public function create()
    {

        return $this->areaRepository->create();


    }//end of create



    public function store(Request $request)
    {
        $request->validate([

            'name_ar', // required
            'name_en', // nullable
            'latitude', // nullable
            'longitude', // nullable
            'active', // required,default (0)

            ]
        );


        return $this->areaRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->areaRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Area $area)
    {
        $request->validate([

            'name_ar', // required
            'name_en', // nullable
            'latitude', // nullable
            'longitude', // nullable
            'active', // required,default (0)

            ]
        );

        return $this->areaRepository->update($area, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Area $area)
    {

        return $this->areaRepository->destroy($area);


    }//end of destroy

    public function cityareas($id)
    {

        $areas = Area::where('city_id', $id)->get();

        return Response::json($areas);


    }

}
