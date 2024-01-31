<?php


namespace App\Repositories\Interfaces;


interface MessageRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($message);

    public function store($request);

    public function update($message, $request);
}
