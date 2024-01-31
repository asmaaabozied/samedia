<?php

namespace App\Repositories\Eloquent;


use App\Models\AqarBooking;
use App\Repositories\Interfaces\AqarBookingRepositoryInterface as IAqarBookingRepositoryAlias;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingStatus;   //belongsTo
use App\Models\City;
use App\Models\Aqar;
use App\Models\User;

use Alert;

class AqarBookingRepository implements IAqarBookingRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.aquarbooking.index', [
            'title' => trans('site.bookings'),
            'model' => 'booking',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // // TODO: Implement create() method.


    }


    public function show($Id)
    {
        // TODO: Implement show() method.
        $data = AqarBooking::find($Id);
        
        $bookingStatus = BookingStatus::all();

        $aqars = Aqar::all();

        $users = User::all();

        $cities = City::all();

        return view('dashboard.aquarbooking.show',compact('data', 'bookingStatus', 'cities', 'users', 'aqars'));
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


        return redirect()->route('dashboard.aquarbooking.index');
    }


    public function edit($data)
    {
        // TODO: Implement edit() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function update($data, $request)
    {
        // TODO: Implement update() method.
    }

    public function acceptbooking($book_id)
    {

        $request_data = AqarBooking::find($book_id);

        $request_data->booking_status_id =2;

        
        $request_data->save();

        if ($request_data) {
            Alert::success('Success', __('site.book_accepted_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }
        return back();


    }

    public function rejectbooking($book_id)
    {

        $data = AqarBooking::find($book_id);

        return view('dashboard.aquarbooking.cancelbook',compact('data'));



    }
    public function confirmRejectbooking($book_id,$request)
    {


        $request_data = AqarBooking::find($book_id);

        $request_data->booking_status_id =4;

        $request_data->cancle_reason=$request->cancel_reason;

        $request_data->cancel_user_id=Auth::id();

        $request_data->save();

        if ($request_data) {
            Alert::success('Success', __('site.book_rejected_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }
        return redirect()->route('dashboard.aquarbooking.index');

    }


    public function attendbooking($book_id)
    {

        $request_data = AqarBooking::find($book_id);

        $request_data->booking_status_id =5;

        
        $request_data->save();

        if ($request_data) {
            Alert::success('Success', __('site.book_attend_successfully'));
        } else {
            Alert::error('Error', __('site.attend_faild'));

        }
        return back();


    }


    public function notattendbooking($book_id)
    {

        $request_data = AqarBooking::find($book_id);

        $request_data->booking_status_id =6;

        
        $request_data->save();

        if ($request_data) {
            Alert::success('Success', __('site.book_notattend_successfully'));
        } else {
            Alert::error('Error', __('site.notattend_faild'));

        }
        return back();


    }
}
