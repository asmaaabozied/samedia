<?php


namespace App\Repositories\Interfaces;


interface BrandRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($brand);

    public function store($request);

    public function update($brand, $request);
}
