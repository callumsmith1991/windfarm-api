<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController as ApiController;
use App\Models\WindFarmTurbine;
use Exception;
use Illuminate\Http\JsonResponse;

class WindFarmTurbineController extends ApiController
{
    public function index(WindFarmTurbine $turbine) : JsonResponse
    {
        return $this->sendResponse($turbine::all()->toArray(), '');
    }

    public function getTurbineComponents(string $id, WindFarmTurbine $turbine) : JsonResponse
    {
        try 
        {
            if ($this->checkIfResourceExists($id, $turbine) == false) {
                return $this->sendError('Turbine not found');
            }
            $components = $turbine::find($id)->components()->get()->toArray();
            return $this->sendResponse($components, '');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }

    public function show(string $id, WindFarmTurbine $turbine) : JsonResponse
    {
        try 
        {
            if ($this->checkIfResourceExists($id, $turbine) == false) {
                return $this->sendError('Turbine not found');
            }
            return $this->sendResponse($turbine::find($id)->toArray(), 'Success!');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }
}
