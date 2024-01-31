<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Interfaces\ContactRepositoryInterface as IContactRepositoryAlias;
use Illuminate\Support\Facades\Auth;

use Alert;

class ContactRepository implements IContactRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.contacts.index', [
            'title' => trans('site.contactsus'),
            'model' => 'contacts',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


    }

    public function edit($data)
    {

    }

    public function show($Id)
    {
        // TODO: Implement show() method.

    }

    public function destroy($data)
    {
        // TODO: Implement destroy() method.


        $result = $data->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }


        return redirect()->route('dashboard.contacts.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.


    }

    public function update($data, $request)
    {
        // TODO: Implement update() method.
    }

}
