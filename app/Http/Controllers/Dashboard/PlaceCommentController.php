<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\PlaceCommentsDataTable;
use App\Http\Controllers\Controller;

use App\Models\PlaceComment;
use App\Repositories\Eloquent\PlaceCommentRepository;
use App\Repositories\Interfaces\PlaceCommentRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlaceCommentController extends Controller
{


    private PlaceCommentRepositoryInterface $PlaceComment;

    public function __construct(PlaceCommentRepositoryInterface $PlaceComment)
    {
        $this->PlaceComment = $PlaceComment;
    }

    public function index(PlaceCommentsDataTable $placesDataTable)
    {

        return $this->PlaceComment->getAll($placesDataTable);

    }


    public function show($id)
    {
        return $this->PlaceComment->show($id);


    }

    public function destroy($id)
    {
        $place =PlaceComment::find($id);

        return $this->PlaceComment->destroy($place);


    }//end of destroy

}
