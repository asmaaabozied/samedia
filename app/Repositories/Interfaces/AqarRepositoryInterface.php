<?php


namespace App\Repositories\Interfaces;


interface AqarRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($Aqar);

    public function store($request);

    public function update($Aqar, $request);
}
