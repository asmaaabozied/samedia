<?php

namespace App\Repositories\Eloquent;


use App\Models\Place;
use App\Models\PlaceComment;
use App\Models\User;
use App\Repositories\Interfaces\PlaceCommentRepositoryInterface as PlaceCommentRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
// use Alert;
use Illuminate\Support\Alert;

class PlaceCommentRepository implements PlaceCommentRepositoryInterfaceAlias
{
    public function getAll($data)
    {


        return $data->render('dashboard.place_comments.index', [
            'title' => trans('site.place_comments'),
            'model' => 'place_comments',
            'count' => $data->count(),

        ]);
    }


    public function show($Id)
    {
        // TODO: Implement show() method.
        $PlaceComment=PlaceComment::find($Id);
        $places = Place::find($PlaceComment->place_id);

        $users = User::all();


        return view('dashboard.place_comments.show', compact('places', 'users', 'PlaceComment'));
    }


    public function destroy($place)
    {
        // TODO: Implement destroy() method.
        $result = $place->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
