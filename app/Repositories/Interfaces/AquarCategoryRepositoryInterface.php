<?php

namespace App\Repositories\Interfaces;

/**
 * Interface AquarCategoryInterface
 * @package App\Repositories\Interfaces
 */
interface AquarCategoryRepositoryInterface
{
    /**
     * Get All AquarCategory at table
     * @return mixed
     */
    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($category);

    public function store($request);

    public function update($category, $request);
  
}