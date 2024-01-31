<?php


namespace App\Repositories\Interfaces;


interface CountryRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($country);

    public function store($request);

    public function update($country, $request);
}
