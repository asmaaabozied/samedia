<?php


namespace App\Repositories\Interfaces;


interface ReviewElementRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($reviewElement);

    public function store($request);

    public function update($reviewElement, $request);
}
