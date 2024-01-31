<?php

namespace App\Repositories\Eloquent;


use App\Models\AdsStatus;
use App\Repositories\Interfaces\AdsStatusRepositoryInterface as IAdsStatusRepositoryAlias;
use Illuminate\Support\Facades\Auth;
use Alert;

class AdsStatusRepository implements IAdsStatusRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.ads_status.index', [
            'title' => trans('site.ads_status'),
            'model' => 'ads_status',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.ads_status.create');
    }

    public function edit($adsStatus)
    {
        // TODO: Implement edit() method.
        $adsStatus = AdsStatus::find($adsStatus);

        return view('dashboard.ads_status.edit',compact('adsStatus'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.
        $adsStatus = AdsStatus::find($Id);

        return view('dashboard.ads_status.show',compact('adsStatus'));
    }

    public function destroy($adsStatus)
    {
        // TODO: Implement destroy() method.


        $result = $adsStatus->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Deleted', __('site.delete_faild'));
        }


        return redirect()->route('dashboard.ads_status.index');
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();
        $adsStatus = AdsStatus::create($request_data);


        if ($adsStatus) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.ads_status.index');

        }
    }

    public function update($adsStatus, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();

        $adsStatus->update($request_data);


        if ($adsStatus) {
            Alert::success('Success', __('site.updated_successfully'));
        } else {
            Alert::error('Error', __('site.update_faild'));

        }

        return redirect()->route('dashboard.ads_status.index');
    }
}
