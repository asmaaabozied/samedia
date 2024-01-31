<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Eloquent\PlaceCategoryRepository;
use App\DataTables\PlaceCategoryDataTable;
use Alert;


class PlaceCategoryController extends Controller
{
    /**
     * @var $PlaceCategoryRepository
     */
    protected $PlaceCategoryRepository;

    /**
     * CarCategoryController constructor.
     */
    public function __construct()
    {
        $this->PlaceCategoryRepository = new PlaceCategoryRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlaceCategoryDataTable $PlaceCategoryDataTable)
    {
        return $this->PlaceCategoryRepository->getAll($PlaceCategoryDataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->PlaceCategoryRepository->create();
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


        return $this->PlaceCategoryRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->PlaceCategoryRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->PlaceCategoryRepository->edit($id);
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

        return $this->PlaceCategoryRepository->update($category, $request);
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

        return $this->PlaceCategoryRepository->destroy($category);
    }
    public function SubCategories($id)
    {

        $subcategories = Category::where('parent_id', $id)->get();

        return Response::json($subcategories);


    }
}
