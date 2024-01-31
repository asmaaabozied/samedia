<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityOnlyResource;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CityController extends Controller
{

    public function cities(Request $request)
    {
        $id = $request->country_id;

        $cities = CityOnlyResource::collection(City::where('country_id', $id)->get());


        if (is_null($cities)) {
            return $this->respondError(__('Country not found.'), ['error' => __('Country not found.')], 404);
        }

        return $this->respondSuccess($cities, 'cities retrieved successfully.');
    }
    public function CityFavourite(Request $request)
    {
        $user_id = Auth::id();

        $users = User::find($user_id);


        $user = $users->FavouriteCities()->toggle($request->aqar_id);

        $status = ($user['attached'] !== []) ? 'favourite' : 'unfavourite';

        return $this->respondSuccess($status, trans('message.data retrieved successfully.'));


    }



    public function citydetail(Request $request)
    {
        $city_id = $request->city_id;
        $city = city::where('id', $city_id)->where('active', 1)->first();
        if (isset($city)) {
            $cityDetail = new CityOnlyResource($city);
            return $this->respondSuccess($cityDetail, 'city retrieved successfully.');

        } else {

            return $this->respondError(__('city not found.'), ['error' => __('city not found.')], 404);

        }


    }

}
