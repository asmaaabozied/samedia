<?php


namespace App\Repositories\Interfaces;


interface AdsStatusRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($adsStatus);

    public function store($request);

    public function update($adsStatus, $request);
}
