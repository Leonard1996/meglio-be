<?php

namespace App\Services;

use App\Helpers\Helpers;
use App\Http\Requests\QuotationRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;


class RequestMicroserviceService
{
    /**
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function prepareConfig($token)
    {

        $config = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'auth' => [],
            'verify' => false
        ];

        if($token != null){
             $config['headers']['Authorization'] = 'Bearer ' . $token;
        };

        return $config;
    }

    public function apiCall($endPoint = null, $method = "GET", array $urlParams = [], array $data = [], String $token = null): array
    {
        if ($endPoint == null) {
            throw new \Exception("Endpoint is required");
        }

        $config = $this->prepareConfig($token);
        // dd($config);
        $client = new Client($config);

        if ($method != "POST" && $method != "GET") {
            throw new \Exception("Method not supported");
        }
        if ($method == "GET") {
            $promise = $client->requestAsync($method, $endPoint);
            //return ['error' => false, 'data' => json_decode($res->getBody()), 'status' => $res->getStatusCode()];
        }

        if ($method == "POST") {
            $promise = $client->requestAsync($method, $endPoint, ['body' => json_encode($data)]);
            // return ['error' => false, 'data' => json_decode($res->getBody()), 'status' => $res->getStatusCode()];
        }
        $promise->then(
            function (ResponseInterface $response) {
                return $response;
            },
            function (RequestException $e) {
                return $e->getMessage();
            }
        );

        try {
            $response = $promise->wait();
            return ['error' => false, 'data' => json_decode($response->getBody()), 'headers' => $response->getHeaders(), 'status' => $response->getStatusCode()];

        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e->getMessage());
            return ['error' => true, 'message' => $e->getMessage()];
        }


    }
}
