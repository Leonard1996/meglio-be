<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Commune;
use App\Services\CommuneService;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommuneController extends Controller
{
    use APITrait;

    protected $communalTerritoryDetailService;

    public function __construct(CommuneService $communeService)
    {
        $this->communeService = $communeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = $this->communeService->getCommunes();
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
     * @param  Commune  $commune
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Commune $commune)
    {
        try {
            $data = $this->communeService->getCommune($commune);
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
