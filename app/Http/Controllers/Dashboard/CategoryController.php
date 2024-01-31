<?php

namespace App\Http\Controllers\Dashboard;

use Response;


use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\TwoFactorService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{


    private CategoryRepositoryInterface $CategoryRepository;

    public function __construct(CategoryRepositoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    public function index(CategoriesDataTable $categoriesDataTable)
    {
        return $this->CategoryRepository->getAll($categoriesDataTable);

    }


    public function show($id)
    {
        return $this->CategoryRepository->show($id);


    }


    public function create()
    {

        return $this->CategoryRepository->create();


    }//end of create

    public function SubCategories($id)
    {

        $subcategories = Category::where('parent_id', $id)->get();

        return Response::json($subcategories);


    }

    public function store(Request $request)
    {
        $request->validate([

                'name_ar' => 'required',
//                'image' => 'required',

            ]
        );


        return $this->CategoryRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->CategoryRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Category $category)
    {
        $request->validate([

                'name_ar' => 'required',

            ]
        );


        return $this->CategoryRepository->update($category, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy($id)
    {
        $category = Category::find($id);

        return $this->CategoryRepository->destroy($category);


    }//end of destroy

}
