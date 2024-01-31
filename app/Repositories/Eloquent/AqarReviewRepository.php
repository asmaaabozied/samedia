<?php

namespace App\Repositories\Eloquent;

use App\Models\Aqar;
use App\Models\AqarReview;
use App\Models\ReviewElement;
use App\Models\User;
use App\Repositories\Interfaces\AqarReviewRepositoryInterface as AqarReviewRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;


class AqarReviewRepository implements AqarReviewRepositoryInterfaceAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.aqar_reviews.index', [
            'title' => trans('site.aqar_reviews'),
            'model' => 'aqar_reviews',
            'count' => $data->count(),

        ]);
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $AqarReview=AqarReview::find($Id);
        $aqars = Aqar::all();
        $ReviewElement = ReviewElement::all();
        $users = User::all();

        return view('dashboard.aqar_reviews.show', compact('aqars', 'users', 'AqarReview', 'ReviewElement'));
    }

    public function destroy($AqarReview)
    {
        // TODO: Implement destroy() method.
        $result = $AqarReview->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
