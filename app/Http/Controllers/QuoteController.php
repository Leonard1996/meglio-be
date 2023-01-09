<?php

namespace App\Http\Controllers;

// use App\Http\Requests\InsuranceHttpRequest;
use App\Helpers\Helpers;
use App\Http\Requests\QuotationRequest;
use App\Models\InsuranceRequest;
use App\Services\RequestMicroserviceService;
use App\Services\RequestService;
use App\Traits\APITrait;
use App\Models\Quotation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class QuoteController extends Controller
{
    use APITrait;
    private RequestService $requestService;
    private RequestMicroserviceService $requestMicroService;

    public function __construct(RequestService $requestService, RequestMicroserviceService $requestMicroService)
    {
        $this->requestService = $requestService;
        $this->requestMicroService = $requestMicroService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    private function store(array $requestData)
    {
        // DONT UNDERSTAND THIS LINE !!
        $this->requestService->saveRequest($requestData);
    }

    public function getRequest(string $token)
    {
        return $this->requestService->getRequestByToken($token);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestQuotation(QuotationRequest $request): JsonResponse
    {
        $requestToken = $this->requestService->saveRequest($request->all());

        if ($requestToken !== "failed") {

            $request_data = $request->all();
            
            $request_data['request_token'] = $requestToken;

            $endpoint = config('app.meglioquestio_rc_endpoint');

            $serviceToken = config('app.meglioquestio_rc_service_token');
          
            $this->requestMicroService->apiCall($endpoint, "POST", [], $request_data, $serviceToken);

            Helpers::writeInfoLogs('quotation', 'quotation', 'QUOTATION_CREATE', Auth::user()->id);

            return response()->json(["request_token" => $requestToken]);
        }

        Helpers::writeErrorLogs('RequestQuotation failed to store the request data');

        return response()->json([
            "message" => "Something went wrong, CODE 1",
            "errors" => [
                "requestQuotation" => "failed to store the request data"
            ]
        ], 400);
    }

    /**
     * @param Quotation $quotation
     * @param int $quotation_data
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveQuotation(Quotation $quotation, int $quotation_data)
    {
        /* $save_quotation = SaveQuotation::insert([
                 'request_id' => $quotation->request_id,
                 'user_id' => Auth::user()->id,
                 'quotation_id' => $quotation_data->id]
         );*/

        //call microservice
        $request_data['request_id'] = $quotation->request_id;
        $request_data['user_id'] = Auth::user()->id;
        $endpoint = config('app.meglioquestio_rc_endpoint') . '/broker/request/' . $quotation->id . '/quotation_data/' . $quotation_data . '/save';

        $quotation = $this->requestMicroService->apiCall($endpoint, "POST", [], $request_data, $quotation->company);

        return response()->json(["request_token" => $quotation]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceRequest $insuranceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InsuranceRequest $insuranceRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\InsuranceRequest $insuranceRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsuranceRequest $insuranceRequest)
    {
        //
    }

    /**
     * Function send email when new qoutaton
     * @return void
     * @author Zoi Murati
     */
    public function new_qoutation()
    {

        $this->requestService->newQoutationNotificaion();
    }

    /**
     * Function send email when saved qoutaton
     * @return void
     * @author Zoi Murati
     */
    public function saved_qoutation()
    {

        $this->requestService->savedQoutationNotificaion();
    }

    /**
     * Function send email when sold qoutaton
     * @return void
     * @author Zoi Murati
     */
    public function sold_qoutation()
    {
        $this->requestService->soldQoutationNotificaion();
    }

    public function getQuotes($requestToken){
        //$request = $this->getRequestToken($requestToken);
        // dd($request);
        try {
            $request = $this->getRequest($requestToken);
            $data = $request;
            $status = Response::HTTP_OK;
            $message = 'Success!';
        } catch (\Exception $e) {
            $data = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getMessage();
        }

        return $this->apiResponse($data, $status, $message);
    }
}
