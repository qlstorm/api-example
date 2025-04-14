<?php

namespace controllers;

use lib\Api;
use lib\Connection;

class Index {

    public static function index() {
        $row = [
            'url' => $_SERVER['REQUEST_URI']
        ];

        Connection::insert('requests', $row);

        Api::process();
    }
}
