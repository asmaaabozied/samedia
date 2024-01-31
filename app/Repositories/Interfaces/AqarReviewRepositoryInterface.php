<?php


namespace App\Repositories\Interfaces;


interface AqarReviewRepositoryInterface
{


    public function getAll($data);

    public function show($Id);

    public function destroy($AqarReview);

}
