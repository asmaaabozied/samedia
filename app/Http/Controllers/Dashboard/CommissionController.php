<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\CommissionsDataTable;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Commission;
use App\Repositories\Interfaces\CommissionRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use App\Models\Invoice;

use Illuminate\Validation\Rule;

class CommissionController extends Controller
{

    private CommissionRepositoryInterface $CommissionRepository;

    public function __construct(CommissionRepositoryInterface $CommissionRepository)
    {
        $this->CommissionRepository = $CommissionRepository;
    }

    public function index(CommissionsDataTable $CommissionsDataTable ,$type,$pay)
    {
       
        return $this->CommissionRepository->getAll($CommissionsDataTable->with(['type' => $type, 'pay' => $pay]));

    }


    public function show($id)
    {
        return $this->CommissionRepository->show($id);


    }


    public function create()
    {

        return $this->CommissionRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                // 'price' => 'required',
                // 'status' => 'required',
                // 'user_id' => 'required',

            ]
        );


        return $this->CommissionRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->CommissionRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    {
        $request->validate([

            // 'price' => 'required',
            // 'status' => 'required',
            // 'user_id' => 'required',

            ]
        );
        $Commission = Commission::find($id);

        return $this->CommissionRepository->update($Commission, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $Commission =Commission::find($id);

        return $this->CommissionRepository->destroy($Commission);


    }//end of destroy


    public function uploadweasel(Request $request)
    {

        $commision=Commission::find($request->id);
        if ($request->hasFile('file')) {
            UploadImage('images/commisions/','waseal_photo', $commision, $request->file('file'));
        }
        $sucess=$commision->update(['status' => 1]);
        

        return $sucess;


    }
}
