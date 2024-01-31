<?php


namespace App\Repositories\Interfaces;


interface InvoiceRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($invoice);

    public function store($request);

    public function update($invoice, $request);
}
