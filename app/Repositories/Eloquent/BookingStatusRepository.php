<?php

namespace App\Repositories\Eloquent;


use App\Models\BookingStatus;
use App\Repositories\Interfaces\BookingStatusRepositoryInterface as IBookingStatusRepositoryAlias;
use Illuminate\Support\Facades\Auth;
use Alert;

class BookingStatusRepository implements IBookingStatusRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.booking_status.index', [
            'title' => trans('site.booking_status'),
            'model' => 'booking_status',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.booking_status.create');
    }

    public function edit($bookingStatus)
    {
        // TODO: Implement edit() method.
        $bookingStatus = BookingStatus::find($bookingStatus);

        return view('dashboard.booking_status.edit',compact('bookingStatus'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $bookingStatus = BookingStatus::find($Id);

        return view('dashboard.booking_status.show',compact('bookingStatus'));
    }

    public function destroy($bookingStatus)
    {
        // TODO: Implement destroy() method.


        $result = $bookingStatus->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }


        return redirect()->route('dashboard.booking_status.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $bookingStatus = BookingStatus::create($request_data);


        if ($bookingStatus) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.booking_status.index');

        }
    }

    public function update($bookingStatus, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();

        $bookingStatus->update($request_data);


        if ($bookingStatus) {
            Alert::success('Success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }

        return redirect()->route('dashboard.booking_status.index');
    }
}
