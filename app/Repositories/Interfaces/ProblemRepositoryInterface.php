<?php


namespace App\Repositories\Interfaces;


interface ProblemRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($problem);

    public function store($request);

    public function update($problem, $request);
}
