<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPrivacyRequest;
use App\Http\Requests\UpdateDataPrivacyRequest;
use App\Models\DataPrivacy;
use App\Services\DataPrivacyService;
use App\Traits\APITrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataPrivacyController extends Controller
{
    use APITrait;

    protected DataPrivacyService $service;

    public function __construct(DataPrivacyService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = $this->service->getDataPrivacy();
            $status = Response::HTTP_OK;
            $message = 'Success!';
        } catch (\Exception $e) {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return $this->apiResponse($data, $status, $message);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DataPrivacyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DataPrivacyRequest $request)
    {
        $validated = $request->validated();

       /* $data_request = [
            "content" => $request->get('content'),
            "type" => $request->get('type'),
            "status" => $request->get('status') ?? $request->get('status'),
            "order_number" => $request->get('order_number'),
        ];*/

        try {
            $data = $this->service->createDataPrivacy($request->all());
            $status = Response::HTTP_CREATED;
            $message = 'Success!';
        } catch (\Exception $e) {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return $this->apiResponse($data, $status, $message);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDataPrivacyRequest $request
     * @param DataPrivacy $dataPrivacy
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDataPrivacyRequest $request, DataPrivacy $dataPrivacy)
    {
        $validated = $request->validated();

        try {
            $data = $this->service->updateDataPrivacy($dataPrivacy, $request->all());
            $status = Response::HTTP_NO_CONTENT;
            $message = 'Success!';
        } catch (\Exception $e) {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return $this->apiResponse($data, $status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DataPrivacy $dataPrivacy
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DataPrivacy $dataPrivacy)
    {
        try {
            $data = $this->service->destroyDataPrivacy($dataPrivacy);
            $status = Response::HTTP_NO_CONTENT;
            $message = 'Success!';
        } catch (\Exception $e) {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return $this->apiResponse($data, $status, $message);
    }
}
