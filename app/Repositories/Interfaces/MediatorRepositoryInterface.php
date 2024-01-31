<?php


namespace App\Repositories\Interfaces;


interface MediatorRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($mediator);

    public function store($request);

    public function update($mediator, $request);
}
