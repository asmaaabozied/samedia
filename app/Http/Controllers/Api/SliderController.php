<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Sliders;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $slider =Sliders::collection(Slider::paginate(10));

        return $this->respondSuccess($slider, trans('message.data retrieved successfully.'));

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
        'media' => 'nullable|file|mimes:jpeg,jpg,png,mp4,mov,avi,wmv', // Accept both image and video file types
        'name' => 'required',
        'description' => 'required',
    ];
    
    $customMessages = [
        'required' => __('validation.attributes.required'),
        'mimes' => __('validation.attributes.mimes', ['values' => 'jpeg, jpg, png, mp4, mov, avi, wmv']), // Provide custom message for file type validation
    ];
    
    $validator = validator()->make($request->all(), $rule, $customMessages);
    
    if ($validator->fails()) {
        return $this->respondError('Validation Error.', $validator->errors(), 400);
    } else {
        $data = Slider::create($request->except('media'));
    
        if ($request->hasFile('media')) { // Check for 'media' file upload
            $mediaFile = $request->file('media');
            $destinationPath = 'uploads/'; // Define the destination path for both image and video uploads
            $filename = time() . '.' . $mediaFile->getClientOriginalExtension();
            $mediaFile->move($destinationPath, $filename);
            $data->media = $filename; // Store the file name in 'media' field
            $data->save();
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
        $data =new Sliders(Slider::find($id));
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
        $data = Slider::find($id);
        $rule = [
            'name' => 'required',
            'description' => 'required'
        ];

        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return $this->respondError('Validation Error.', $validator->errors(), 400);

        } else {
            $data->update($request->except('media'));
            if ($request->hasFile('media')) { // Check for 'media' file upload
                $mediaFile = $request->file('media');
                $destinationPath = 'uploads/'; // Define the destination path for both image and video uploads
                $filename = time() . '.' . $mediaFile->getClientOriginalExtension();
                $mediaFile->move($destinationPath, $filename);
                $data->media = $filename; // Store the file name in 'media' field
                $data->save();
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
            $data = Slider::find($id);

            $data->delete();

            return $this->respondSuccess(null, __('data deleted successfully.'));



        }
    }
