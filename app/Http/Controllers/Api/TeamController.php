<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Teams;
use App\Models\Project;
use App\Models\Team;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Teams::collection(Team::paginate(10));

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


            $data = Team::create($request->except('image'));
            if ($request->hasFile('image')) {
                $thumbnail = $request->file('image');
                $destinationPath = 'images/teams/';
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($destinationPath, $filename);
                $data->image = $filename;
                $data->save();
            }
//            if ($request->hasFile('image')) {
//                UploadImage2('images/teams/', 'image', $data, $request->file('image'));
//            }

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
        $data = new Teams(Team::find($id));
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
        $data = Team::find($id);
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


            $data->update($request->except('image'));
            if ($request->hasFile('image')) {
                $thumbnail = $request->file('image');
                $destinationPath = 'images/teams/';
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($destinationPath, $filename);
                $data->image = $filename;
                $data->save();
            }

//            if ($request->hasFile('image')) {
//                UploadImage2('images/teams/', 'image', $data, $request->file('image'));
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
        $data = Team::find($id);

        $data->delete();

        return $this->respondSuccess(null, __('data deleted successfully.'));


    }
}
