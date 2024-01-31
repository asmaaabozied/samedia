<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MediatorsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Mediator;
use App\Repositories\Interfaces\MediatorRepositoryInterface;
use App\Repositories\Interfaces\ProblemRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MediatorController extends Controller
{


    private MediatorRepositoryInterface $mediatorRepository;

    public function __construct(MediatorRepositoryInterface $mediatorRepository)
    {
        $this->mediatorRepository = $mediatorRepository;
    }

    public function index(MediatorsDataTable $mediatorsDataTable)
    {
        return $this->mediatorRepository->getAll($mediatorsDataTable);

    }


    public function show($id)
    {
        return $this->mediatorRepository->show($id);


    }


    public function create()
    {

        return $this->mediatorRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'name' => 'required',
                'phone' => 'required',

            ]
        );


        return $this->mediatorRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->mediatorRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Mediator $mediator)
    {
        $request->validate([

                'name' => 'required',
                'phone' => 'required',

            ]
        );

        return $this->mediatorRepository->update($mediator, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Mediator $mediator)
    {

        return $this->mediatorRepository->destroy($mediator);


    }//end of destroy

}
