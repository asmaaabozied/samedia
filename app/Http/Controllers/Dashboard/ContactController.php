<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContactsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{


    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(ContactsDataTable $contactsDataTable)
    {
        return $this->contactRepository->getAll($contactsDataTable);

    }


    public function show($id)
    {



    }


    public function create()
    {




    }//end of create


    public function store(Request $request)
    {


    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {



    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, $id)
    {



    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Contact $contact)
    {
        return $this->contactRepository->destroy($contact);

    }//end of destroy

}
