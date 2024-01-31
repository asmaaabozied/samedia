<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ProblemsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Problem;
use App\Repositories\Interfaces\ProblemRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProblemController extends Controller
{


    private ProblemRepositoryInterface $problemRepository;

    public function __construct(ProblemRepositoryInterface $problemRepository)
    {
        $this->problemRepository = $problemRepository;
    }

    public function index(ProblemsDataTable $problemsDataTable)
    {
        return $this->problemRepository->getAll($problemsDataTable);

    }


    public function show($id)
    {
        return $this->problemRepository->show($id);


    }


    public function create()
    {

        return $this->problemRepository->create();


    }//end of create



    public function store(Request $request)
    {
        $request->validate([

                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',

            ]
        );


        return $this->problemRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->problemRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Problem $problem)
    {
        $request->validate([

                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',

            ]
        );

        return $this->problemRepository->update($problem, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Problem $problem)
    {

        return $this->problemRepository->destroy($problem);


    }//end of destroy

}
