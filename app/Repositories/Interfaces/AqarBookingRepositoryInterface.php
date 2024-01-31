<?php


namespace App\Repositories\Interfaces;


interface AqarBookingRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($data);

    public function show($Id);

    public function destroy($data);

    public function store($request);

    public function update($data,$request);

    public function acceptbooking($book_id);

    public function rejectbooking($book_id);

    public function confirmRejectbooking($book_id,$request);
}
