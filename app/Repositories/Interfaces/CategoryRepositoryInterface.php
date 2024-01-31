<?php


namespace App\Repositories\Interfaces;


interface CategoryRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($category);

    public function store($request);

    public function update($category, $request);


}
