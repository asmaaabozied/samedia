<?php


namespace App\Repositories\Interfaces;


interface CarCommentRepositoryInterface
{


    public function getAll($data);



    public function show($Id);

    public function destroy($brand);


}
