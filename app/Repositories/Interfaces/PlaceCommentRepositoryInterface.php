<?php


namespace App\Repositories\Interfaces;


interface PlaceCommentRepositoryInterface
{


    public function getAll($data);



    public function show($Id);

    public function destroy($place);


}
