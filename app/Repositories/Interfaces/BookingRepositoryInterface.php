<?php


namespace App\Repositories\Interfaces;


interface BookingRepositoryInterface
{


    public function getAll($data);



    public function show($Id);

    public function destroy($booking);

    public function acceptbooking($car_id);

    public function rejectbooking($car_id);

    public function confirmRejectbooking($book_id,$request);


}
