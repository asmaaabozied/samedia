<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\InvoicesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Repositories\Interfaces\InvoiceRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{


    private InvoiceRepositoryInterface $InvoiceRepository;

    public function __construct(InvoiceRepositoryInterface $InvoiceRepository)
    {
        $this->InvoiceRepository = $InvoiceRepository;
    }

    public function index(InvoicesDataTable $InvoicesDataTable)
    {

        return $this->InvoiceRepository->getAll($InvoicesDataTable);

    }


    public function show($id)
    {
        return $this->InvoiceRepository->show($id);


    }


    public function create()
    {

        return $this->InvoiceRepository->create();


    }//end of create


    public function store(Request $request)
    {
        return $this->InvoiceRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->InvoiceRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    { 
        $Invoice = Invoice::find($id);

        return $this->InvoiceRepository->update($Invoice, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $Invoice =Invoice::find($id);

        return $this->InvoiceRepository->destroy($Invoice);


    }//end of destroy

}
