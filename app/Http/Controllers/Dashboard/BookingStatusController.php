<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\BookingStatusDataTable;
use App\Http\Controllers\Controller;

use App\Models\BookingStatus;
use App\Repositories\Interfaces\BookingStatusRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingStatusController extends Controller
{


    private BookingStatusRepositoryInterface $bookingStatusRepository;

    public function __construct(BookingStatusRepositoryInterface $bookingStatusRepository)
    {
        $this->bookingStatusRepository = $bookingStatusRepository;
    }

    public function index(BookingStatusDataTable $bookingStatusDataTable)
    {
        return $this->bookingStatusRepository->getAll($bookingStatusDataTable);

    }


    public function show($id)
    {
        return $this->bookingStatusRepository->show($id);


    }


    public function create()
    {

        return $this->bookingStatusRepository->create();


    }//end of create



    public function store(Request $request)
    {
        return $this->bookingStatusRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->bookingStatusRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, BookingStatus $bookingStatus)
    {
        return $this->bookingStatusRepository->update($bookingStatus, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(BookingStatus $bookingStatus)
    {

        return $this->bookingStatusRepository->destroy($bookingStatus);


    }//end of destroy

}
