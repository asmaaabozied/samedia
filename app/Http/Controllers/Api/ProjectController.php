<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\Image;
use App\Http\Resources\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Projects::collection(Project::with('images')->latest()->get());

        return $this->respondSuccess($data, trans('message.data retrieved successfully.'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'image' => 'nullable', 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'description' => 'required',

        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {
            $data = Project::create($request->except('image', 'images'));
            if ($request->image) {
                $thumbnail = $request->file('image');
                $destinationPath = 'images/projects/';
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($destinationPath, $filename);
                $data->image = $filename;
                $data->save();
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('images/projects/', $filename);
                    $data->images()->create(['url' => $filename]);
                    $data->save();
                }
            }

            return $this->respondSuccess($data, trans('message.User register successfully.'));


        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = new Projects( Project::with('images')->find($id));
        return $this->respondSuccess($data, trans('message.data retrieved successfully.'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        return $request;
        $data = Project::find($id);
        $rule = [
            'image' => 'nullable', 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'description' => 'required',

        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {


            $data->update($request->except('image','images'));
            if ($request->hasFile('image')) {
                $thumbnail = $request->file('image');
                $destinationPath = 'images/projects/';
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($destinationPath, $filename);
                $data->image = $filename;
                $data->save();
            }

            if ($request->file('images')){
                foreach($request->file('images') as $image){
                $destinationPath = 'images/projects/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);
                $data_image = new Image();
                $data_image->url = $filename;
                $data_image->project_id = $data->id;
                $data_image->save();

                }

            }
//
//            if ($request->hasFile('image')) {
//                UploadImage2('images/projects/', 'image', $data, $request->file('image'));
//            }
        }

            return $this->respondSuccess($data, trans('message.User updated successfully'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public
        function destroy($id)
        {
            $data = Project::find($id);

            $data->delete();

            return $this->respondSuccess(null, __('data deleted successfully.'));



        }
    }
