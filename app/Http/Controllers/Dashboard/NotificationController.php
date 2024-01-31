<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\NotificationsDataTable;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotificationController extends Controller
{

    private NotificationRepositoryInterface $NotificationRepository;

    public function __construct(NotificationRepositoryInterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }

    public function index(NotificationsDataTable $NotificationsDataTable)
    {

        return $this->NotificationRepository->getAll($NotificationsDataTable);

    }


    public function show($id)
    {
        return $this->NotificationRepository->show($id);


    }


    public function create()
    {

        return $this->NotificationRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'title' => 'required',
                'booking_id' => 'required',
                'description' => 'required',
                'status' => 'required',
                'type' => 'required',
                'user_id' => 'required',

            ]
        );


        return $this->NotificationRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->NotificationRepository->edit($id);


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

            'title' => 'required',
            'booking_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type' => 'required',
            'user_id' => 'required',
            ]
        );
        $notification = Notification::find($id);

        return $this->NotificationRepository->update($notification, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $notification =Notification::find($id);

        return $this->NotificationRepository->destroy($notification);


    }//end of destroy

}
