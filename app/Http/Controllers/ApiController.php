<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $statusCode;
    public $exceptionErrorMessage = 'Something went wrong, Please contact Administrator';

    public function sendResponse(array $result, string $message) : JsonResponse
    {

        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        $this->setStatusCode(200);
        return response()->json($response, $this->statusCode);
    }

    public function sendError(string $error, $messages = [], $errorCode = 404) : JsonResponse
    {

        $response = [
            'success' => false,
            'message' => $error
        ];

        if(!empty($messages)) {
            $response['data'] = $messages;
        }
        $this->setStatusCode($errorCode);
        return response()->json($response, $this->statusCode);
    }

    private function setStatusCode($code) : void
    {
        $this->statusCode = $code;
    }

    protected function checkIfResourceExists(string $id, $model) : bool
    {
        if($model instanceof \Illuminate\Database\Eloquent\Model) {

           if(is_null($model::find($id))) {
              return false;
           } else {
              return true;
           }

        } else {
            throw new Exception('Parameter 2 is not of data type Model', 500);
        }
    }

}
