<?php

namespace App\Http\Controllers\Api;

use App\Models\Freq_question;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Validator;
use Illuminate\Validation\Rule;

//import Rule class
use DB;

class AuthController extends Controller
{

    public function freqquestion(Request $request)
    {


        $questions = Freq_question::get()->map(function ($question) {
            $question->answer = preg_replace("/\r|\n/", "", strip_tags($question->answer)) ?? '';
            return $question;
        });

        if (count($questions)) {

            return $this->respondSuccess($questions, trans('message.data retrieved successfully.'));


        } else {
            return $this->respondErrorArray(__('message.Data not found.'), ['error' => __('message.Data not found.')], 200);

        }

    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $rule = [
            // 'email' => 'max:254|unique:email|nullable',
            // 'email' => ['max:254|nullable',Rule::unique('users')->ignore($user->id)],
            'email' => "nullable|email|max:254|unique:users,email," . $user->id . ",id",
            'image' => 'nullable', 'mimes:jpg,jpeg,png',
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            // 'password' => 'nullable|min:6',
            // 'c_password' => 'nullable|same:password',
            // 'country_code' => 'required_with:phone',
            // 'phone' => 'required_with:country_code|min:9|unique:users',
        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if (empty($request->all())) {

            return $this->respondError(trans('message.Data not changed'), ['error' => trans('message.Data not changed')], 403);

        }
        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {

            $user = User::findorfail(Auth::id());

            if ($request->hasFile('image')) {
                UploadImage2('images/users/', 'image', $user, $request->file('image'));
            }
            $user->firstname = isset($request->firstname) ? $request->firstname : $user->firstname;
            $user->lastname = isset($request->lastname) ? $request->lastname : $user->lastname;
            $user->email = isset($request->email) ? $request->email : $user->email;
            // $user->password = Hash::make($request['password']) ?? '';
            // $user->active =1;
            $user->save();
            // $success['token'] = $user->createToken('MyApp')->accessToken;
            $user->image = asset('images/users/') . '/' . $user->image;
            // $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname','code','image']);
            $users = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code', 'image']);

            return $this->respondSuccess($users, trans('message.User updated successfully'));


        }

    }

    public function changephone(Request $request)
    {
        $rule = [
            'country_code' => 'required_with:phone',
            'phone' => 'required_with:country_code|min:9|unique:users',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {

            $user = User::findorfail(Auth::id());

            // $code = $request->code;
            $set = '123456789';
            $code = substr(str_shuffle($set), 0, 4);
            $msg = trans('message.please verified your account') . "\n";
            $msg = $msg . trans('message.code activation') . "\n" . $code;
            send_sms_code($msg, $request->phone, $request->country_code);
            $user->code = $code;
            $user->save();
            return $this->respondSuccess(json_decode('{}'), trans('message.message sent successfully.'));

        }
        return $this->respondError(trans('message.code not correct'), ['error' => trans('message.code not correct')], 401);
    }

    public function confirmupdatephone(Request $request)
    {
        $rule = [
            'country_code' => 'required_with:phone',
            'phone' => 'required_with:country_code|min:9|unique:users',
            'code' => 'required|min:3',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {

            $user = User::findorfail(Auth::id());
            $code = $request->code;

            if ($user->code == $code) {
                $user->phone = isset($request->phone) ? $request->phone : $user->phone;
                $user->country_code = isset($request->country_code) ? $request->country_code : $user->country_code;
                $user->save();

                $success['token'] = $user->createToken('MyApp')->accessToken;
                $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'code']);

                return $this->respondSuccess($success, trans('message.User updated successfully'));


            } else {
                return $this->respondError(trans('message.code not correct'), ['error' => trans('message.code not correct')], 401);
            }

        }
    }

    public function logout()
    {

//        Auth::user()->token()->revoke();

        Auth::logout();
        return $this->respondSuccess(null, trans('message.logout'));


    }

    public function changepassword(Request $request)
    {
        $user = Auth::user();

        $rule = [
            'password' => 'required|min:6',
            'new_password' => 'required|different:password|min:6',
            'c_password' => 'nullable|same:new_password',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);


        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {

            $user = Auth::user();

            if (Hash::check($request->input('password'), $user->password)) {

                $user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                $users = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code']);

                return $this->respondSuccess($users, trans('message.chanagepassword'));

            } else {
                return $this->respondError(trans('message.incorrect current password'), ['error' => trans('message.incorrect current password')], 403);

            }

        }

    }

    public function register(Request $request)
    {
        $rule = [
            'email' => 'required|max:254|unique:users|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'nullable|min:9|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'nullable|same:password',

        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {


            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);

            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone']);


            return $this->respondSuccess($success, trans('message.User register successfully.'));
        }

    }

    public
    function login(Request $request, AuthenticationException $exception)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $success['token'] = $user->createToken('MyApp')->accessToken;
            $user->image = asset('images/users/') . '/' . $user->image;
            $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone']);

            return $this->respondSuccess($success, trans('message.User login successfully.'));
        } else {
            return $this->respondError(trans('message.wrong credientials'), ['error' => trans('message.wrong credientials')], 403);
        }
    }

    public
    function guest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_token' => 'required'

        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        } else {
            $input = $request->all();
            $input['isguest'] = 1;
            $user = User::create($input);
            $user->active = 1;
            $user->token = $user->createToken('MyApp')->accessToken;
            $user->save();
            $success['token'] = $user->createToken('MyApp')->accessToken;

            return $this->respondSuccess($success, trans('message.guest successfully.'));
        }
    }

    public
    function activateRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required_without:userId',
            'phone' => 'required_without:userId',
            'code' => 'required|min:3',
            'userId' => 'required_without:phone',
            'device_token' => 'min:2',
        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        $country_code = $request->country_code;
        $phone = $request->phone;
        $code = $request->code;


        if ($request->country_code) {
            $user = User::where(function ($query) use ($country_code, $phone, $code) {
                $query->where('country_code', $country_code)->where('phone', $phone)->where('code', $code);
            })->first();

        } elseif ($request->userId) {


            $user = User::Where('id', $request->userId)->where('code', $code)->first();

        }
        if ($user) {
            if ($user->active) {
                if ($request->device_token) {
                    $user->device_token = $request->device_token;
                    $user->save();
                }
                $success['token'] = $user->createToken('MyApp')->accessToken;
                $user->image = asset('images/users/') . '/' . $user->image;
                $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code', 'image']);
                return $this->respondSuccess($success, trans('message.User already active.'));
            } else {
                $user->active = 1;
                $user->device_token = $request->device_token;
                $user->save();
                $success['token'] = $user->createToken('MyApp')->accessToken;
                $user->image = asset('images/users/') . '/' . $user->image;
                $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code', 'image']);
                return $this->respondSuccess($success, trans('message.User activate successfully.'));
            }
        } else {
            return $this->respondError(trans('message.code not correct'), ['error' => trans('message.code not correct')], 401);
        }
    }

    public
    function resendCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required_without:userId',
            'phone' => 'required_without:userId',
            'userId' => 'required_without:phone',
        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        $country_code = $request->country_code;
        $phone = $request->phone;
        $user = User::where(function ($query) use ($country_code, $phone) {
            if ($country_code && $phone) {
                $query->where('country_code', $country_code)->where('phone', $phone);
            }
        })->orWhere('id', $request->userId)->first();
        if ($user) {
            $set = '123456789';
            $code = substr(str_shuffle($set), 0, 4);
            $msg = trans('message.please verified your account') . "\n";
            $msg = $msg . trans('message.code activation') . "\n" . $code;
            send_sms_code($msg, $user->phone, $user->country_code);
            $user->code = $code;
            $user->save();
            return $this->respondSuccess(json_decode('{}'), trans('message.message sent successfully.'));

        } else {
            return $this->respondError(trans('message.user not found'), ['error' => trans('message.user not found')], 404);
        }
    }

    public
    function resendCodeForUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required_without:userId',
            'phone' => 'required_without:userId',
            'userId' => 'required_without:phone',
        ]);
        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        if (auth()->user()['id']) {
            $user = auth()->user();
            $set = '123456789';
            $code = substr(str_shuffle($set), 0, 4);
            $msg = trans('message.please verified your account') . "\n";
            $msg = $msg . trans('message.code activation') . "\n" . $code;
            send_sms_code($msg, $request->phone, $request->country_code);
            $user->code = $code;
            $user->save();
            return $this->respondSuccess(json_decode('{}'), trans('message.message sent successfully.'));
        } else {
            return $this->respondError(trans('message.user not found'), ['error' => trans('message.user not found')], 200);
        }
    }

    public
    function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        $user = User::where('phone', $request->phone)->where('country_code', $request->country_code)->first();
        if ($user) {

            $set = '123456789';
            $code = substr(str_shuffle($set), 0, 4);
            $msg = trans('message.for change password') . "\n";
            $msg = $msg . trans('message.your code ') . "\n" . $code;
            send_sms_code($msg, $request->phone, $request->country_code);
            $user->code = $code;
            $user->save();
            $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code']);
            return $this->respondSuccess($success, trans('message.message sent successfully.'));

        } else {
            return $this->respondError(trans('message.user not found'), ['error' => trans('message.user not found')], 404);
        }
    }

    public
    function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required_without:userId',
            'phone' => 'required_without:userId',
            'code' => 'required|min:3',
            'userId' => 'required_without:phone',
        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        $country_code = $request->country_code;
        $phone = $request->phone;
        $code = $request->code;

        $user = User::where(function ($query) use ($country_code, $phone, $code) {
            $query->where('country_code', $country_code)->where('phone', $phone)->where('code', $code);
        })->orWhere([
            ['id', $request->userId],
            ['code', $code]])->first();
        if ($user) {
            return $this->respondSuccess(json_decode('{}'), trans('message.code correct.'));
        } else {
            return $this->respondError(trans('message.code not correct'), ['error' => trans('message.code not correct')], 401);
        }
    }

    public
    function resetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required_without:userId',
            'phone' => 'required_without:userId',
            'userId' => 'required_without:phone',
            'password' => 'required|min:6|unique:users',
            'c_password' => 'same:password|min:6',
        ]);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        }
        $country_code = $request->country_code;
        $phone = $request->phone;
        if ($request->userId) {
            $user = User::where('id', $request->userId)->first();
        } else {
            $user = User::where(function ($query) use ($country_code, $phone) {
                $query->where('country_code', $country_code)->where('phone', $phone);
            })->first();
        }
        if ($user) {
            if ((Hash::check($request->password, $user->password))) {
                return $this->respondError('Validation Error.', ['password' => [trans('message.password should not be the same with old password')]], 400);
                // return $this->respondError('Validation Error.', trans('message.password should not be the same with old password'), 400);
            } else {
                $user->password = Hash::make($request->password);
                $user->active = 1;
                $user->save();
                return $this->respondSuccess(json_decode('{}'), trans('message.password reset successfully.'));
            }
        } else {

            return $this->respondError(trans('message.user not found'), ['error' => trans('message.user not found')], 404);
        }
    }
}
