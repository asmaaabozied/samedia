<?php


namespace App\Repositories\Interfaces;


interface PlaceRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($place);

    public function destroy2($place_table);

    public function store($request);

    public function update($place, $request);
}
