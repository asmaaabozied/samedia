<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SectionsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{


    private SectionRepositoryInterface $SectionRepository;

    public function __construct(SectionRepositoryInterface $SectionRepository)
    {
        $this->SectionRepository = $SectionRepository;
    }

    public function index(SectionsDataTable $SectionsDataTable)
    {
        return $this->SectionRepository->getAll($SectionsDataTable);

    }


    public function show($id)
    {
        return $this->SectionRepository->show($id);


    }


    public function create()
    {

        return $this->SectionRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',

            ]
        );


        return $this->SectionRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->SectionRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Section $Section)
    {
        $request->validate([
            'name_ar' => ['required'],

        ]);

        return $this->SectionRepository->update($Section, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Section $Section)
    {

        return $this->SectionRepository->destroy($Section);


    }//end of destroy

}
