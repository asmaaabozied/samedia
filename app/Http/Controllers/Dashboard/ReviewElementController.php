<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ReviewElementsDataTable;
use App\Http\Controllers\Controller;

use App\Models\ReviewElement;
use App\Repositories\Interfaces\ReviewElementRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewElementController extends Controller
{


    private ReviewElementRepositoryInterface $reviewElementRepository;

    public function __construct(ReviewElementRepositoryInterface $reviewElementRepository)
    {
        $this->reviewElementRepository = $reviewElementRepository;
    }

    public function index(ReviewElementsDataTable $reviewElementsDataTable)
    {
        return $this->reviewElementRepository->getAll($reviewElementsDataTable);

    }


    public function show($id)
    {
        return $this->reviewElementRepository->show($id);


    }


    public function create()
    {

        return $this->reviewElementRepository->create();


    }//end of create



    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',
                'name_en' => 'nullable',
                'icon' => 'required',
            ]
        );


        return $this->reviewElementRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->reviewElementRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, ReviewElement $reviewElement)
    {
        $request->validate([

                'name_ar' => 'required',
                'name_en' => 'nullable',
                'icon' => 'required',

            ]
        );

        return $this->reviewElementRepository->update($reviewElement, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(ReviewElement $reviewElement)
    {

        return $this->reviewElementRepository->destroy($reviewElement);


    }//end of destroy

}
