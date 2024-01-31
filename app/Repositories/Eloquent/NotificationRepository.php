<?php

namespace App\Repositories\Eloquent;


use App\Models\Notification;
use App\Models\User;
use App\Repositories\Interfaces\NotificationRepositoryInterface as NotificationRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;

class NotificationRepository implements NotificationRepositoryInterfaceAlias
{
    public function getAll($data)
    {

//        return $data->query();

        return $data->render('dashboard.notifications.index', [
            'title' => trans('site.notifications'),
            'model' => 'notifications',
            'count' => $data->count(),

        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.

        $users = User::all();
        
        return view('dashboard.notifications.create', compact('users'));
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $notification = Notification::find($Id);

        $users = User::all();
        return view('dashboard.notifications.edit', compact('notification', 'users'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.

        $notification = Notification::find($Id);

        $users = User::all();
        return view('dashboard.notifications.show', compact('notification', 'users'));
    }


    public function store($request)
    {

        $request_data = $request->all();

        // To Make User Active

        $notification = Notification::create($request_data);

        if ($notification) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.notifications.index');

        }
    }

    public function update($notification, $request)
    {
        // TODO: Implement update() method.

        $request_data = $request->all();


        $notification->update($request_data);

        if ($notification) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.notifications.index');
//            session()->flash('success', __('site.updated_successfully'));
        } else {

            return redirect()->route('dashboard.notifications.index');

        }
    }


    public function destroy($notification)
    {
        // TODO: Implement destroy() method.

        $result = $notification->delete();
        if ($result) {
                Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
                Alert::toast('Error', __('site.delete_faild'));

            //    session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}