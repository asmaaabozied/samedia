<?php


namespace App\Repositories\Interfaces;


interface AdvertisingRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($ad);

    public function store($request);

    public function update($ad, $request);
}
