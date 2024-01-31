<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MessagesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{


    private MessageRepositoryInterface $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function index(MessagesDataTable $messagesDataTable)
    {
        return $this->messageRepository->getAll($messagesDataTable);

    }


    public function show($id)
    {
        return $this->messageRepository->show($id);


    }


    public function create()
    {

        return $this->messageRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'messages' => 'required',
                'to' => 'required',                
            ]
        );

        return $this->messageRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->messageRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Message $message)
    {
        $request->validate([

            'messages' => 'required',
            'to' => 'required',  

            ]
        );

        return $this->messageRepository->update($message, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Message $message)
    {
        return $this->messageRepository->destroy($message);

    }//end of destroy

}
