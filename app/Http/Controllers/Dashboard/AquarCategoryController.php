<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Eloquent\AquarCategoryRepository;
use App\DataTables\AquarCategoryDataTable;


class AquarCategoryController extends Controller
{
    /**
     * @var $AquarCategoryRepository
     */
    protected $AquarCategoryRepository;

    /**
     * CarCategoryController constructor.
     */
    public function __construct()
    {
        $this->AquarCategoryRepository = new AquarCategoryRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AquarCategoryDataTable $AquarCategoryDataTable)
    {
        return $this->AquarCategoryRepository->getAll($AquarCategoryDataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->AquarCategoryRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',

            ]
        );


        return $this->AquarCategoryRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->AquarCategoryRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->AquarCategoryRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

                'name_ar' => 'required',


            ]
        );
        $category = Category::find($id);

        return $this->AquarCategoryRepository->update($category, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        return $this->AquarCategoryRepository->destroy($category);
    }
}
