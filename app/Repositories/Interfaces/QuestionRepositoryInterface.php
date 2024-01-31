<?php


namespace App\Repositories\Interfaces;


interface QuestionRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($question);

    public function store($request);

    public function update($question, $request);
}
