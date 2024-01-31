<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\AqarReviewDataTable;
use App\Http\Controllers\Controller;

use App\Models\AqarReview;
use App\Repositories\Interfaces\AqarReviewRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AqarReviewController extends Controller
{


    private AqarReviewRepositoryInterface $aqarReviewRepository;

    public function __construct(AqarReviewRepositoryInterface $aqarReviewRepository)
    {
        $this->aqarReviewRepository = $aqarReviewRepository;
    }

    public function index(AqarReviewDataTable $aqarReviewDataTable)
    {
        return $this->aqarReviewRepository->getAll($aqarReviewDataTable);

    }


    public function show($id)
    {
        return $this->aqarReviewRepository->show($id);


    }

    public function destroy(AqarReview $aqarReview)
    {

        return $this->aqarReviewRepository->destroy($aqarReview);


    }//end of destroy

}
