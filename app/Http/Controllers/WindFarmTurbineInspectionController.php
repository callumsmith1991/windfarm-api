<?php

namespace App\Http\Controllers;

use App\Models\WindFarmComponentInspection;
use Illuminate\Http\Request;
use App\Models\WindFarmTurbineInspection;
use Exception;
use Illuminate\Http\JsonResponse;

class WindFarmTurbineInspectionController extends ApiController
{
    public function index(WindFarmTurbineInspection $inspection) : JsonResponse
    {
        return $this->sendResponse($inspection::all()->toArray(), '');
    }

    public function show(string $id, WindFarmTurbineInspection $inspection) : JsonResponse
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

    public function getComponentInspections(string $id, WindFarmTurbineInspection $inspection) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($id, $inspection) == false) {
                return $this->sendError('Inspection not found');
            }

            $turbineInspections = $inspection::find($id)->componentsInspections()->get()->toArray();
            return $this->sendResponse($turbineInspections, '');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }

    public function getComponentInspection(string $turbineInspectionId, string $componentInspectionId, WindFarmTurbineInspection $turbineInspection, WindFarmComponentInspection $componentInspection) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($turbineInspectionId, $turbineInspection) == false) {
                return $this->sendError('Turbine inspection not found');
            }

            if ($this->checkIfResourceExists($componentInspectionId, $componentInspection) == false) {
                return $this->sendError('Component inspection not found');
            }

            return $componentInspection->where('id', $componentInspectionId)->where('wf_turbine_inspection', $turbineInspectionId)->get()->toArray();
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }
}
