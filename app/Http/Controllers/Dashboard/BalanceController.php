<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\BalancesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Balance;
use App\Repositories\Interfaces\BalanceRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BalanceController extends Controller
{


    private BalanceRepositoryInterface $BalanceRepository;

    public function __construct(BalanceRepositoryInterface $BalanceRepository)
    {
        $this->BalanceRepository = $BalanceRepository;
    }

    public function index(BalancesDataTable $BalancesDataTable)
    {

        return $this->BalanceRepository->getAll($BalancesDataTable);

    }


    public function show($id)
    {
        return $this->BalanceRepository->show($id);


    }


    public function create()
    {

        return $this->BalanceRepository->create();


    }//end of create


    public function store(Request $request)
    {
        return $this->BalanceRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->BalanceRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    { 
        $Balance = Balance::find($id);

        return $this->BalanceRepository->update($Balance, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $Balance =Balance::find($id);

        return $this->BalanceRepository->destroy($Balance);


    }//end of destroy

}
