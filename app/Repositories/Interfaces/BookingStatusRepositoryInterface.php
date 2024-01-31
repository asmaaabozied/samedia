<?php


namespace App\Repositories\Interfaces;


interface BookingStatusRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($bookingStatus);

    public function store($request);

    public function update($bookingStatus, $request);
}
