<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\VehicleMake;
use App\Services\VehicleMakeService;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleMakeController extends Controller
{
    use APITrait;

    protected $vehicleMakeService;

    public function __construct(VehicleMakeService $vehicleMakeService)
    {
        $this->vehicleMakeService = $vehicleMakeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = $this->vehicleMakeService->getVehicleMakes();
            $status = Response::HTTP_OK;
            $message = 'Success!';
        }
        catch (\Exception $e)
        {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
            Helpers::writeErrorLogs($e);
        }
        return $this->apiResponse($data, $status, $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  VehicleMake  $vehicleMake
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($vehicleMake)
    {
        try {
            $data = $this->vehicleMakeService->getVehicleMake($vehicleMake);
            $status = Response::HTTP_OK;
            $message = 'Success!';
        }
        catch (\Exception $e)
        {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
            Helpers::writeErrorLogs($e);
        }

        return $this->apiResponse($data, $status, $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
