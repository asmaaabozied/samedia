<?php

namespace App\Http\Controllers\Dashboard;

use Alert;
use Response;

use App\DataTables\CitiesDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\category_city;

use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class CityController extends Controller
{


    private CityRepositoryInterface $cityRepository;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(CitiesDataTable $citiesDataTable)
    {
        return $this->cityRepository->getAll($citiesDataTable);

    }


    public function show($id)
    {
        return $this->cityRepository->show($id);


    }


    public function create()
    {

        return $this->cityRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',
//                'code' => 'required',

            ]
        );


        return $this->cityRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->cityRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, City $city)
    {
        $request->validate([

                'name_ar' => 'required',
//                'code' => 'required',

            ]
        );


        return $this->cityRepository->update($city, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(City $city)
    {

        return $this->cityRepository->destroy($city);


    }//end of destroy


    public function countrycities($id)
    {

        $cities = City::where('country_id', $id)->get();

       return $cities;

        return Response::json($cities);


    }

    public function categorycities($id)
    {


        $categoryrelated = category_city::join('categories', 'categories.id', '=', 'cities-categories.category_id')->where('cities-categories.city_id', $id)->where('categories.parent_id', '=', 1)->where('categories.type', '=', 1)->get();

        return Response::json($categoryrelated);


    }


   

}
