<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WindFarmInspection;
use Exception;
use Illuminate\Http\JsonResponse;

class WindFarmInspectionsController extends ApiController
{
    public function index(WindFarmInspection $inspection) : JsonResponse
    {
        return $this->sendResponse($inspection::all()->toArray(), '');
    }

    public function show(string $id, WindFarmInspection $inspection) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($id, $inspection) == false) {
                return $this->sendError('inspection not found');
            }
            
            return $this->sendResponse($inspection::find($id)->toArray(), 'Success!');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }

    public function getTurbinesInspections(string $id, WindFarmInspection $inspection) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($id, $inspection) == false) {
                return $this->sendError('Inspection not found');
            }

            $turbineInspections = $inspection::find($id)->turbineInspections()->get()->toArray();
            return $this->sendResponse($turbineInspections, '');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }
}
