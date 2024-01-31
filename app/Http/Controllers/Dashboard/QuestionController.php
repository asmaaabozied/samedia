<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\QuestionsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Freq_question;
use App\Repositories\Eloquent\QuestionRepository;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{


    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index(QuestionsDataTable $questionDataTable)
    {
        return $this->questionRepository->getAll($questionDataTable);

    }


    public function show($id)
    {
        return $this->questionRepository->show($id);


    }


    public function create()
    {

        return $this->questionRepository->create();


    }//end of create


    public function store(Request $request)
    {
        $request->validate([

                'question' => 'required',
                'answer' => 'required',

            ]
        );


        return $this->questionRepository->store($request);

    }//end of store

    /*----------------------------------------------------
      || Name     : redirect to edit pages          |
      || Tested   : Done                                    |
      ||                                     |
     ||                                    |
       -----------------------------------------------------*/

    public function edit($id)
    {
        return $this->questionRepository->edit($id);


    }//end of user

    /*----------------------------------------------------
     || Name     : update data into database using users        |
     || Tested   : Done                                    |
       ||                                     |
        ||                                    |
           -----------------------------------------------------*/

    public function update(Request $request, Freq_question $question)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        return $this->questionRepository->update($question, $request);


    }//end of update

    /*----------------------------------------------------
 || Name     : delete data into database using users        |
 || Tested   : Done                                    |
 ||                                     |
 ||                                    |
   -----------------------------------------------------*/

    public function destroy(Freq_question $question)
    {

        return $this->questionRepository->destroy($question);


    }//end of destroy

}
