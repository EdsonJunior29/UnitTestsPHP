<?php

class WeatherMonitor
{
    protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function getAverageTemperature(string $start, string $end)
    {
        $start_temp = $this->service->getTeperature($start);
        $end_temp = $this->service->getTeperature($end);

        return ($start_temp + $end_temp) / 2;
    }
}
