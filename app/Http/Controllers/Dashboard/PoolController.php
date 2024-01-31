<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PoolsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Pool;
use App\Repositories\Interfaces\PoolRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PoolController extends Controller
{


    private PoolRepositoryInterface $poolRepository;

    public function __construct(PoolRepositoryInterface $poolRepository)
    {
        $this->poolRepository = $poolRepository;
    }

    public function index(PoolsDataTable $poolsDataTable)
    {
        return $this->poolRepository->getAll($poolsDataTable);

    }


    public function show($id)
    {
        return $this->poolRepository->show($id);


    }


    public function create()
    {

        return $this->poolRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',

            ]
        );


        return $this->poolRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->poolRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Pool $pool)
    {
        $request->validate([
            'name_ar' => ['required'],

        ]);

        return $this->poolRepository->update($pool, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Pool $pool)
    {

        return $this->poolRepository->destroy($pool);


    }//end of destroy

}
