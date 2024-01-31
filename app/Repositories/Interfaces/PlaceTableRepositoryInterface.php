<?php


namespace App\Repositories\Interfaces;


interface PlaceTableRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($placeTable);

    public function store($request);

    public function update($placeTable, $request);
}
