<?php


namespace App\Repositories\Interfaces;


interface AqarCommentRepositoryInterface
{


    public function getAll($data);



    public function show($Id);

    public function destroy($aqar);


}
