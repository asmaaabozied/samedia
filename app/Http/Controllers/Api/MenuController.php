<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Intervention\Image\Facades\Image;
use App\Http\Resources\Menus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Menus::collection(Menu::orderBy('order', 'asc')->paginate(10));

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
            'name' => 'required',
            'url' => 'required',
            'order' => 'required',
        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        } else {
            $data = Menu::create($request->all());
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
        $data =new Menus(Menu::find($id));
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
        $data = Menu::find($id);
        $rule = [
            'name' => 'required',
            'url' => 'required',
            'order' => 'required',
        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {
            return $this->respondError('Validation Error.', $validator->errors(), 400);
        } else {
            $data->update($request->all());
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
            $data = Menu::find($id);

            $data->delete();

            return $this->respondSuccess(null, __('data deleted successfully.'));
        }
    }
