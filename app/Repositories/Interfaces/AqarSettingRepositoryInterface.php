<?php


namespace App\Repositories\Interfaces;


interface AqarSettingRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($AqarSetting);

    public function store($request);

    public function update($AqarSetting, $request);
}
