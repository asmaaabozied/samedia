<?php

namespace App\Repositories\Eloquent;

use App\Models\Aqar;
use App\Models\AqarComment;
use App\Models\AqarBooking;
use App\Models\User;
use App\Repositories\Interfaces\AqarCommentRepositoryInterface as AqarCommentRepositoryInterfaceAlias;
use Illuminate\Support\Facades\DB;
use Alert;


class AqarCommentRepository implements AqarCommentRepositoryInterfaceAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.aqar_comments.index', [
            'title' => trans('site.aqar_comments'),
            'model' => 'aqar_comments',
            'count' => $data->count(),

        ]);
    }


    public function show($Id)
    {
        // TODO: Implement show() method.
        $AqarComment=AqarComment::find($Id);
        $aqars = Aqar::all();
        $AqarBooking = AqarBooking::all();
        $users = User::all();

        return view('dashboard.aqar_comments.show', compact('aqars', 'users', 'AqarComment', 'AqarBooking'));
    }


    public function destroy($aqar)
    {
        // TODO: Implement destroy() method.
        $result = $aqar->delete();
        if ($result) {
                Alert::toast('Success', __('site.deleted_successfully'));
        } else {
                Alert::toast('Success', __('site.delete_faild'));

//                session()->flash('error', __('site.delete_faild'));
        }

        return back();
    }
}
