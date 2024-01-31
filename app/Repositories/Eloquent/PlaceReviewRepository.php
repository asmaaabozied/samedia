<?php

namespace App\Repositories\Eloquent;

use App\Models\Place;
use App\Models\PlaceReview;
use App\Models\User;
use App\Repositories\Interfaces\PlaceReviewRepositoryInterface as PlaceReviewRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;


class PlaceReviewRepository implements PlaceReviewRepositoryInterfaceAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.place_reviews.index', [
            'title' => trans('site.place_reviews'),
            'model' => 'place_reviews',
            'count' => $data->count(),

        ]);
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $PlaceReview=PlaceReview::find($Id);


        return view('dashboard.place_reviews.show', compact( 'PlaceReview'));
    }

    public function destroy($PlaceReview)
    {
        // TODO: Implement destroy() method.
        $result = $PlaceReview->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
