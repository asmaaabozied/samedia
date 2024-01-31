<?php

namespace App\Repositories\Eloquent;

use App\Models\Freq_question;
use App\Repositories\Interfaces\QuestionRepositoryInterface as IQuestionRepositoryAlias;
use Alert;


class QuestionRepository implements IQuestionRepositoryAlias
{
    public function getAll($data)
    {
        return $data->render('dashboard.questions.index', [
            'title' => trans('site.questions'),
            'model' => 'questions',
            'count' => $data->count(),
        ]);
    }

    public function create()
    {
        // TODO: Implement create() method.


        return view('dashboard.questions.create');
    }

    public function edit($Id)
    {
        // TODO: Implement edit() method.

        $question = Freq_question::find($Id);

        return view('dashboard.questions.edit', compact('question'));
    }

    public function show($Id)
    {
        // TODO: Implement show() method.


        $question = Freq_question::find($Id);


        return view('dashboard.questions.show', compact('question'));
    }

    public function destroy($question)
    {
        // TODO: Implement destroy() method.

        $result = $question->delete();
        if ($result) {
            Alert::toast('Deleted', __('site.deleted_successfully'));
        } else {
            Alert::toast('Error', __('site.delete_faild'));

        }

        return back();
    }

    public function store($request)
    {
        // TODO: Implement store() method.

        $request_data = $request->all();


        $question = Freq_question::create($request_data);


        if ($question) {
            Alert::success('Success', __('site.added_successfully'));

            return redirect()->route('dashboard.questions.index');

        }
    }

    public function update($question, $request)
    {
        // TODO: Implement update() method.


        $request_data = $request->all();


        $question->update($request_data);


        if ($question) {
            Alert::success('Success', __('site.updated_successfully'));

            return redirect()->route('dashboard.questions.index');
        } else {
            Alert::error('Error', __('site.update_faild'));

            return redirect()->route('dashboard.questions.index');

        }
    }
}
