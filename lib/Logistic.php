<?php

namespace lib;

class Logistic {

    public static function process() {
        $date = $_POST['date'];
        $direction = $_POST['direction'];

        setlocale(LC_ALL, 'ru_RU');

        $dates = [];

        $exclude = [
            11,
            83,
            95
        ];

        for ($i = 1; $i < 22; $i++) {
            $timestamp = strtotime($date . ' +' . $i . ' days');

            $day = date('j', $timestamp);
            $month = date('n', $timestamp);

            if (in_array($day + $month, $exclude)) {
                continue;
            }

            $weekDay = date('N', $timestamp);

            if ($direction == 'Город_1' || $direction == 'Город_2') {
                if ($i == 1 && date('G', $timestamp) > 16) {
                    if (in_array($weekDay, [1, 3, 5])) {
                        continue;
                    }
                }

                if (!in_array($weekDay, [1, 3, 5])) {
                    continue;
                }
            }

            if ($direction == 'Город_3') {
                if ($i == 1 && date('G', $timestamp) > 22) {
                    if (in_array($weekDay, [2, 4, 6])) {
                        continue;
                    }
                }

                if (!in_array($weekDay, [2, 4, 6])) {
                    continue;
                }
            }

            $dates[] = [
                'date' => date('Y-m-d', $timestamp),
                'day' => date('l', $timestamp),
                'title' => date('j', $timestamp) . ' ' . date('F', $timestamp)
            ];
        }

        return $dates;
    }
}
