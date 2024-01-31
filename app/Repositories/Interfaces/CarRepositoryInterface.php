<?php


namespace App\Repositories\Interfaces;


interface CarRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($car);

    public function store($request);

    public function update($car, $request);
}
