<?php


namespace App\Repositories\Interfaces;


interface CarReviewRepositoryInterface
{


    public function getAll($data);

    public function show($Id);

    public function destroy($CarReview);

}
