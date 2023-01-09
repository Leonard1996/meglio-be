<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\VehicleModelRequest;
use App\Services\VehicleModelService;
use App\Traits\APITrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleModelController extends Controller
{
    use APITrait;

    protected VehicleModelService $vehicleModelService;

    public function __construct(VehicleModelService $vehicleModelService)
    {
        $this->vehicleModelService = $vehicleModelService;
    }

    public function index(VehicleModelRequest $request) : JsonResponse
    {
        try {
            return $this->apiResponse($this->vehicleModelService->get(['make_id' => $request->get('make_id')]));
        }
        catch (Exception $e) {
            Helpers::writeErrorLogs($e);
            return $this->apiResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
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
     * @param  VehicleModel  $vehicleModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($vehicleModel)
    {
        try {
            $data = $this->vehicleModelService->getVehicleModel($vehicleModel);
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
