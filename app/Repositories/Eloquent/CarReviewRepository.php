<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Models\CarReview;
use App\Models\User;
use App\Repositories\Interfaces\CarReviewRepositoryInterface as CarReviewRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;


class CarReviewRepository implements CarReviewRepositoryInterfaceAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.car_reviews.index', [
            'title' => trans('site.car_reviews'),
            'model' => 'car_reviews',
            'count' => $data->count(),

        ]);
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $CarReview=CarReview::find($Id);
        $cars = Car::all();
        $users = User::all();

        return view('dashboard.car_reviews.show', compact('cars', 'users', 'CarReview'));
    }

    public function destroy($CarReview)
    {
        // TODO: Implement destroy() method.
        $result = $CarReview->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
