<?php


namespace App\Repositories\Interfaces;


interface BalanceRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($balance);

    public function store($request);

    public function update($balance, $request);
}
