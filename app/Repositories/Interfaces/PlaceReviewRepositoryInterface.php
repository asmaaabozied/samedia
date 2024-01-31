<?php


namespace App\Repositories\Interfaces;


interface PlaceReviewRepositoryInterface
{


    public function getAll($data);

    public function show($Id);

    public function destroy($PlaceReview);

}
