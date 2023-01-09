<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class APIService{
    protected string $endpoint;

    public function request($method, $path, $data = [])
    {
        $response = $this->getRequest($method, $path, $data);

        if ($response->ok()) {
            return $response->json();
        }

        throw new HttpException($response->status(),$response->body());
    }

    public function getRequest($method, $path, $data = [])
    {
        return \Http::acceptJson()->withHeaders([
            // 'Authorization' => 'Bearer ' . request()->cookie('jwt')
        ])->$method("{$this->endpoint}/{$path}", $data);
    }

    public function post($path, $data)
    {
        return $this->request('post', $path, $data);
        dd($path, $data, $this);
//        $resp = \Http::post($this->endpoint . "/" . $path, $data)->json();
//        dd($resp);
        return $resp;
    }

    public function get($path)
    {
        return $this->request('get', $path);
    }

    public function put($path, $data)
    {
        return $this->request('put', $path, $data);
    }

    public function delete($path)
    {
        return $this->request('delete', $path);
    }
}
