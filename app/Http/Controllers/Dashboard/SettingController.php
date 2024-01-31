<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\HomeServices;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{


    private SettingRepositoryInterface $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $setting = Setting::first();
        $home_serviecs2 = HomeServices::all();

        return view('dashboard.settings.index', compact('setting','home_serviecs2'));


//        $this->settingRepository->getAll();


    }


    public function update(Request $request)
    {


        $request->validate([
            'terms_conditions' => ['required'],
            'website_address' => ['required'],
            'email' => ['required'],
            'website_link' => ['required'],

        ]);
        $home_serviecs = HomeServices::first();
        // $home_serviecs = HomeServices::all();
        return $this->settingRepository->update($home_serviecs,$request);


    }//end of update
    public function destroy($id)
    {
        $home_serviecs = HomeServices::find($id);

        return $this->settingRepository->destroy($home_serviecs);


    }
}
