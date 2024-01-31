<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\CarReviewDataTable;
use App\Http\Controllers\Controller;

use App\Models\CarReview;
use App\Repositories\Interfaces\CarReviewRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarReviewController extends Controller
{


    private CarReviewRepositoryInterface $carReviewRepository;

    public function __construct(CarReviewRepositoryInterface $carReviewRepository)
    {
        $this->carReviewRepository = $carReviewRepository;
    }

    public function index(CarReviewDataTable $carReviewDataTable)
    {
        return $this->carReviewRepository->getAll($carReviewDataTable);

    }

    public function show($id)
    {
        return $this->carReviewRepository->show($id);

    }

    public function destroy(CarReview $carReview)
    {

        return $this->carReviewRepository->destroy($carReview);

    }//end of destroy

}
