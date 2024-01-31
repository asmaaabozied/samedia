<?php

namespace App\Http\Controllers\Dashboard;
use Response;
use App\DataTables\PlaceReviewDataTable;
use App\Http\Controllers\Controller;

use App\Models\PlaceReview;
use App\Repositories\Interfaces\PlaceReviewRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlaceReviewController extends Controller
{

    protected $placeReviewRepository;

    public function __construct(PlaceReviewRepositoryInterface $placeReviewRepository)
    {
        $this->placeReviewRepository = $placeReviewRepository;
    }

    public function index(PlaceReviewDataTable $placeReviewDataTable)
    {
        return $this->placeReviewRepository->getAll($placeReviewDataTable);

    }

    public function show($id)
    {
        return $this->placeReviewRepository->show($id);

    }

    public function destroy(PlaceReview $placeReview)
    {

        return $this->placeReviewRepository->destroy($placeReview);

    }//end of destroy

}
