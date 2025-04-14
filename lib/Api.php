<?php

namespace lib;

class Api {

    public static function process() {
        if (isset($_POST['lat']) && isset($_POST['lon'])) {
            $res = [
                'city' => Address::getCity($_POST['lat'], $_POST['lon']),
                'temp' => Weather::getTemp($_POST['lat'], $_POST['lon'])
            ];

            echo json_encode($res);
        }

        if (isset($_POST['date']) && isset($_POST['direction'])) {
            echo json_encode(Logistic::process());
        }
    }
}
