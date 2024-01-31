<?php

namespace App\Http\Controllers\Dashboard;


use App\DataTables\AqarCommentsDataTable;
use App\Http\Controllers\Controller;

use App\Models\AqarComment;
use App\Repositories\Eloquent\AqarCommentRepository;
use App\Repositories\Interfaces\AqarCommentRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AqarCommentController extends Controller
{

    private AqarCommentRepositoryInterface $AqarRepository;

    public function __construct(AqarCommentRepositoryInterface $AqarRepository)
    {
        $this->AqarRepository = $AqarRepository;
    }

    public function index(AqarCommentsDataTable $aqarsDataTable)
    {

        return $this->AqarRepository->getAll($aqarsDataTable);

    }

    public function show($id)
    {
        return $this->AqarRepository->show($id);


    }
    public function destroy($id)
    {
        $aqar =AqarComment::find($id);

        return $this->AqarRepository->destroy($aqar);


    }//end of destroy

}
