<?php


namespace App\Repositories\Interfaces;


interface ServiceAqarRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($data);

    public function store($request);

    public function update($data, $request);

    public function destroy2($SubAqarService);

}
