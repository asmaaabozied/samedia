<?php


namespace App\Repositories\Interfaces;


interface DepositRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($Deposit);

    public function store($request);

    public function update($Deposit, $request);
}
