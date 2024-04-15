<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Role::with('permissions')->get();

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
            'name' => 'required|unique:roles',
            'description' => 'nullable',

        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {


            $data = Role::create($request->except('permissions'));

            if ($request->has('permissions')) {
                $all_permissions = array_merge($request->permissions, []);
                $data->syncPermissions($all_permissions);

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
        $data = Role::with('permissions')->find($id);
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
        $data = Role::find($id);
        $rule = [
            'name' => 'required',
            'description' => 'nullable',

        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {
            $data->update($request->except('permissions'));
            if ($request->has('permissions')) {
                $all_permissions = array_merge($request->permissions, []);            
                $data->permissions()->detach();            
                $data->syncPermissions($all_permissions);
            } else {
                $data->permissions()->detach();
            }
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
        $data = Role::find($id);

        $data->delete();

        return $this->respondSuccess(null, __('data deleted successfully.'));


    }
}
