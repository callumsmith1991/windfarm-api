<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WindFarm;
use App\Http\Controllers\ApiController as ApiController;
use Exception;
use Illuminate\Http\JsonResponse;

class WindFarmController extends ApiController
{
    /**
     * Show Windfarm
     */
    public function show(string $id, WindFarm $windfarm) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($id, $windfarm) == false) {
                return $this->sendError('Windfarm not found');
            }

            return $this->sendResponse($windfarm::find($id)->toArray(), 'Success!');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }

    /**
     * Get All Windfarms
     */
    public function index(Windfarm $windfarm) : JsonResponse
    {
        return $this->sendResponse($windfarm::all()->toArray(), '');
    }

    /**
     * Get Turbines in this windfarm
     */
    public function getTurbines(string $id, Windfarm $windfarm) : JsonResponse
    {
        try {

            if ($this->checkIfResourceExists($id, $windfarm) == false) {
                return $this->sendError('Windfarm not found');
            }

            $turbines = $windfarm::find($id)->turbines()->get()->toArray();
            return $this->sendResponse($turbines, '');
        } catch (Exception $e) {
            return $this->sendError($this->exceptionErrorMessage, [$e->getMessage()], 500);
        }
    }
}
