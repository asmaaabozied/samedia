<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function respondSuccess($result, $message, $code = 200)
    {
        $response = [
            'code' => $code,
            'status' => true,
            'message' => $message,
            'data' => $result,
            'errorData' => null,
        ];


        return response()->json($response, $code);
    }

    public function respondSuccesswithversion($result,$versions, $message, $code = 200)
    {
        $response = [
            'code' => $code,
            'status' => true,
            'message' => $message,
            'data' => $result,
            'version'=>$versions,
            'errorData' => null,
        ];


        return response()->json($response, $code);
    }

    public function respondSuccessPaginate($result, $message, $code = 200)
    {
        unset($result->meta->links);
        $response = [
            'code' => $code,
            'status' => true,
            'message' => $message,
            'data' =>$result->data ,
            'pagination'=>$result->meta,
            'errorData' => null,
        ];


        return response()->json($response, $code);
    }

    public function respondSuccessPaginate1($result, $message, $code = 200)
    {
        $result=$result->toArray();
        $response = [
            'code' => $code,
            'status' => true,
            'message' => $message,
            'data' =>$result['data'],
            'pagination'=>$result['pagination'],
            'errorData' => null,
        ];


        return response()->json($response, $code);
    }


    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError($error, $errorMessages = [], $code)
    {
        if ($code == 404) {
            $code1 = 404;
        } elseif ($code == 500) {
            $code1 = 500;
        } else {
            $code1 = 200;
        }
        $response = [
            'code' => $code,
            'status' => false,
            'message' => $error,
            'data' =>null,
        ];


        if (!empty($errorMessages)) {
            $response['errorData'] = $errorMessages;
        }


        return response()->json($response, $code1);
    }
    public function respondErrorArray($error, $errorMessages = [], $code)
    {
        if ($code == 404) {
            $code1 = 404;
        } elseif ($code == 500) {
            $code1 = 500;
        } else {
            $code1 = 200;
        }
        $response = [
            'code' => $code,
            'status' => false,
            'message' => $error,
            'data' =>[],
        ];


        if (!empty($errorMessages)) {
            $response['errorData'] = $errorMessages;
        }


        return response()->json($response, $code1);
    }

    public function respondwarning($result, $message, $errorMessages, $code = 200)
    {
        $response = [
            'code' => $code,
            'status' => false,
            'message' => $message,
            'data' => $result,
        ];


        if (!empty($errorMessages)) {
            $response['errorData'] = $errorMessages;
        }


        return response()->json($response, 200);
    }
}
