<?php

namespace lib;

class Address {

    public static $apiKey = '';

    public static function getCity($lat, $lon) {
        $params = [
            'apikey' => self::$apiKey,
            'geocode' => $lon . ',' . $lat,
            'kind' => 'locality',
            'format' => 'json'
        ];

        $res = file_get_contents('https://geocode-maps.yandex.ru/v1?' . http_build_query($params));

        $resObject = json_decode($res);

        if ($resObject->response->GeoObjectCollection->featureMember) {
            return $resObject->response->GeoObjectCollection->featureMember[0]->GeoObject->name;
        }
    }
}
