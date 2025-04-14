<?php

namespace lib;

class Weather {

    public static $accessKey = '';

    public static function getTemp($lat, $lon) {
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => 'X-Yandex-Weather-Key: ' . self::$accessKey
            ]
        ];

        $context = stream_context_create($options);

        $res = file_get_contents("https://api.weather.yandex.ru/v2/forecast?lat=$lat&lon=$lon", false, $context);

        $objectRes = json_decode($res);

        return $objectRes->fact->temp;
    }
}
