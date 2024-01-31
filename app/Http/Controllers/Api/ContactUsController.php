<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NotificationResource;
use Validator;

class ContactUsController extends Controller
{


    public function contacts()
    {

        $settings = Setting::first();

        return $this->respondSuccess($settings, __('message.data retrieved successfully.'));

    }


    public function termandcondition()
    {

        $settings = Setting::first()->only(['id', 'terms_conditions']);

        return $this->respondSuccess($settings, __('message.data retrieved successfully.'));

    }


    public function contactus(Request $request)
    {

        $rule = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|min:9',
            'message' => 'required',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {

            $request_data = $request->all();
            $request_data['user_id'] = Auth::id() ?? null;

            $contact = Contact::create($request_data);

            return $this->respondSuccess($contact, __('site.added_successfully'));


        }


    }


    public function listofcontacts()
    {


        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);
        return $this->respondSuccess($contacts, __('message.data retrieved successfully.'));


    }


    public function deletecontact($id)
    {

        $contact = Contact::find($id);

        $contact->delete();


        return $this->respondSuccess(null, __('data deleted successfully.'));


    }

    public function updatesetting(Request $request)
    {

        $rule = [
            'id' => 'required',
            'website_address' => 'required',
            'phone_one' => 'required',
            'email' => 'required|min:9',
            'description' => 'nullable',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {


            $setting = Setting::find($request['id']);
            $setting->update($request->all());

            return $this->respondSuccess($setting, __('message.User updated successfully'));


        }

    }


}
