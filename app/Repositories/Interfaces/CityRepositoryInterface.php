<?php


namespace App\Repositories\Interfaces;


interface CityRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($city);

    public function store($request);

    public function update($city, $request);
}
