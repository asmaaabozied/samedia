<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\DepositsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Deposit;
use App\Repositories\Interfaces\DepositRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepositController extends Controller
{


    private DepositRepositoryInterface $DepositRepository;

    public function __construct(DepositRepositoryInterface $DepositRepository)
    {
        $this->DepositRepository = $DepositRepository;
    }

    public function index(DepositsDataTable $DepositsDataTable,$type,$pay)
    {

        return $this->DepositRepository->getAll($DepositsDataTable->with(['type' => $type, 'pay' => $pay]));

    }


    public function show($id)
    {
        return $this->DepositRepository->show($id);


    }


    public function create()
    {

        return $this->DepositRepository->create();


    }//end of create


    public function store(Request $request)
    {
        return $this->DepositRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->DepositRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    { 
        $Deposit = Deposit::find($id);

        return $this->DepositRepository->update($Deposit, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $Deposit =Deposit::find($id);

        return $this->DepositRepository->destroy($Deposit);


    }//end of destroy


    public function uploadweasel(Request $request)
    {
        $deposit=Deposit::find($request->id);
        if ($request->hasFile('file')) {
            UploadImage('images/commisions/','waseal_photo', $deposit, $request->file('file'));
        }
        $sucess=$deposit->update(['status' => 1]);

        return $sucess;


    }

}
