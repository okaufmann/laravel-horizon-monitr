<?php

namespace Okaufmann\LaravelHorizonMonitr\Monitr;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class Client
{
    public function __construct($config)
    {
        $this->basePath = $config['url'];
        $this->token = $config['token'];
    }

    public function sendHorizonStats(HorizonStatsDto $stats)
    {
        try {
            $this->prepareRequest()
                ->post("{$this->basePath}/api/horizon-stats", $stats->toArray())
                ->throw();
        } catch (RequestException $ex) {
            if ($ex->response->status() !== Response::HTTP_SERVICE_UNAVAILABLE) {
                throw $ex;
            }
        }
    }

    protected function prepareRequest()
    {
        return Http::withToken($this->token)
            ->retry(3, 5000)
            ->accept('application/json');
    }
}
