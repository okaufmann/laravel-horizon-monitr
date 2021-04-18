<?php

namespace Okaufmann\LaravelHorizonMonitr\Monitr;

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
        $this->prepareRequest()
            ->post("{$this->basePath}/api/horizon-stats", $stats->toArray())
            ->throw();
    }

    protected function prepareRequest()
    {
        return Http::withToken($this->token)
            ->retry(3, 5000)
            ->accept('application/json');
    }
}
