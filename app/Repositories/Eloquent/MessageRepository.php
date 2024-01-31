<?php

namespace App\Repositories\Eloquent;

use App\Models\Message;
use App\Models\User;
use App\Repositories\Interfaces\MessageRepositoryInterface as IMessageRepositoryAlias;
use Alert;


class MessageRepository implements IMessageRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.messages.index', [
            'title' => trans('site.contacts'),
            'model' => 'message',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.
        $users = User::all();
        return view('dashboard.messages.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $message = Message::find($Id);
        $users = User::all();
        return view('dashboard.messages.edit', compact('message', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $message = Message::find($Id);
        $users = User::all();
        return view('dashboard.messages.show', compact('message', 'users'));
    }

    public function destroy($message)
    {
        // TODO: Implement destroy() method.

        $result = $message->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

            //    session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();

        // To Make User Active

        $message = Message::create($request_data);

        if ($message) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.message.index');

        }
    }

    public function update($message, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();


        $message->update($request_data);

        if ($message) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.message.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.message.index');

        }
    }
}
