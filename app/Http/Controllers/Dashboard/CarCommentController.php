<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\CarCommentsDataTable;
use App\Http\Controllers\Controller;

use App\Models\CarComment;
use App\Repositories\Eloquent\CarCommentRepository;
use App\Repositories\Interfaces\CarCommentRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarCommentController extends Controller
{


    private CarCommentRepositoryInterface $CarRepository;

    public function __construct(CarCommentRepositoryInterface $CarRepository)
    {
        $this->CarRepository = $CarRepository;
    }

    public function index(CarCommentsDataTable $carsDataTable)
    {

        return $this->CarRepository->getAll($carsDataTable);

    }


    public function show($id)
    {
        return $this->CarRepository->show($id);


    }









    public function destroy($id)
    {
        $car =CarComment::find($id);

        return $this->CarRepository->destroy($car);


    }//end of destroy

}
