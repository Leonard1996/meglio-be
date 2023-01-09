<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\VehicleVersionRequest;
use App\Models\VehicleVersion;
use App\Services\VehicleVersionService;
use App\Traits\APITrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleVersionController extends Controller
{
    use APITrait;

    protected VehicleVersionService $vehicleVersionService;

    public function __construct(VehicleVersionService $vehicleVersionService)
    {
        $this->vehicleVersionService = $vehicleVersionService;
    }

    public function index(VehicleVersionRequest $request) : JsonResponse
    {
        try {
            return $this->apiResponse($this->vehicleVersionService->get([
                'model_id' => $request->get('model_id'),
                'year' => $request->get('year'),
                'month' => $request->get('month')
            ]));
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
     * @param  VehicleVersion  $vehicleVersion
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($vehicleVersion)
    {
        try {
            $data = $this->vehicleVersionService->getVehicleVersion($vehicleVersion);
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
