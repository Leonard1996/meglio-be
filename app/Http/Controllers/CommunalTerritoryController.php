<?php

namespace App\Http\Controllers;

use App\Services\CommunalTerritoryService;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CommunalTerritory;
use Illuminate\Http\JsonResponse;
use App\Helpers\Helpers;

class CommunalTerritoryController extends Controller
{
    use APITrait;

    protected $communalTerritoryService;

    public function __construct(CommunalTerritoryService $communalTerritoryService)
    {
        $this->communalTerritoryService = $communalTerritoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $data = $this->communalTerritoryService->getCommunalTerritories();
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
     * Create a new Communal Territory.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  CommunalTerritory  $communalTerritory
     * @return JsonResponse
     */
    public function show(CommunalTerritory $communalTerritory)
    {
        try {
            $data = $this->communalTerritoryService->getCommunalTerritory($communalTerritory);
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
     * @param  Request  $request
     * @param  CommunalTerritory  $communalTerritory
     * @return JsonResponse
     */
    public function update(Request $request, CommunalTerritory  $communalTerritory)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CommunalTerritory  $communalTerritory
     * @return JsonResponse
     */
    public function destroy(CommunalTerritory $communalTerritory)
    {

    }
}
