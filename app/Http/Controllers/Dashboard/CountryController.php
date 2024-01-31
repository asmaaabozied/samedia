<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountriesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{


    private CountryRepositoryInterface $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index(CountriesDataTable $countriesDataTable)
    {
        return $this->countryRepository->getAll($countriesDataTable);

    }


    public function show($id)
    {
        return $this->countryRepository->show($id);


    }


    public function create()
    {

        return $this->countryRepository->create();


    }//end of create

    public function AddCity()
    {

        return view('dashboard.countries.cities');
    }

    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',
//                'code' => 'required',

            ]
        );


        return $this->countryRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->countryRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name_ar' => 'required',

            'code' => ['required', Rule::unique('countries')->ignore($country->id)],

        ]);

        return $this->countryRepository->update($country, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Country $country)
    {

        return $this->countryRepository->destroy($country);


    }//end of destroy

}
