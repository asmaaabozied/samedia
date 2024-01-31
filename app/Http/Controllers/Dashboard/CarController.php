<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\CarsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Models\Category;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarController extends Controller
{


    private CarRepositoryInterface $CarRepository;

    public function __construct(CarRepositoryInterface $CarRepository)
    {
        $this->CarRepository = $CarRepository;
    }

    public function index(CarsDataTable $carsDataTable)
    {

        return $this->CarRepository->getAll($carsDataTable);

    }


    public function show($id)
    {
        return $this->CarRepository->show($id);


    }


    public function create()
    {

        return $this->CarRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $data['day_num'] = $request['day_num'];
        $data['price'] = $request['price'];
        $request['changed_price']=json_encode($data)!=null?json_encode($data, JSON_NUMERIC_CHECK):json_encode([]);
       
        return $this->CarRepository->store($request);



    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->CarRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $data['day_num'] = $request['day_num'];
        $data['price'] = $request['price'];
        $request['changed_price']=json_encode($data)!=null?json_encode($data, JSON_NUMERIC_CHECK):json_encode([]);
        return $this->CarRepository->update($car, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $car =Car::find($id);

        return $this->CarRepository->destroy($car);


    }//end of destroy

}
