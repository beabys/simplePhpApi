<?php

namespace Tests;

/**
 * Class Mocks
 * @package Tests
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class Mocks
{
    const INPUT_INVALID_MISSING = [
        [
            "origin"=> "Madrid",
            "transport-type"=> "train",
            "transport-number"=> "78A",
            "seat"=> "45B",
            "baggage-handdle"=> false
        ],
        [
            "origin"=> "Madrid 2",
            "destination"=> "Mexico",
            "transport-type"=> "airplane,",
            "transport-number"=> "SK24",
            "seat"=> "5B",
            "gate" => "6",
            "baggage-handdle"=> true
        ],
    ];

    const INPUT_INVALID = [
        [
            "origin"=> "Madrid",
            "destination"=> "Barcelona",
            "transport-type"=> "train",
            "transport-number"=> "78A",
            "seat"=> "45B",
            "baggage-handdle"=> false
        ],
        [
            "origin"=> "Madrid 2",
            "destination"=> "Mexico",
            "transport-type"=> "airplane,",
            "transport-number"=> "SK24",
            "seat"=> "5B",
            "gate" => "6",
            "baggage-handdle"=> true
        ],
    ];

    const INPUT_VALID = [
        [
            "origin"=> "Madrid",
            "destination"=> "Barcelona",
            "transport-type"=> "train",
            "transport-number"=> "78A",
            "seat"=> "45B",
            "baggage-handdle"=> false
        ],
        [
            "origin"=> "New York JFK",
            "destination"=> "Mexico",
            "transport-type"=> "airplane,",
            "transport-number"=> "SK24",
            "seat"=> "5B",
            "gate" => "6",
            "baggage-handdle"=> true
        ],
        [
            "origin"=> "Gerona Airport",
            "destination"=> "Stockholm",
            "transport-type"=> "airplane",
            "transport-number"=> "SK455",
            "seat"=> "3A",
            "gate" => "45B",
            "baggage-drop"=> "344"
        ],
        [
            "origin"=> "Barcelona",
            "destination"=> "Gerona Airport",
            "transport-type"=> "bus",
            "baggage-handdle"=> false
        ],
        [
            "origin"=> "Stockholm",
            "destination"=> "New York JFK",
            "transport-type"=> "airplane,",
            "transport-number"=> "SK22",
            "seat"=> "7B",
            "gate" => "22",
            "baggage-handdle"=> true
        ]
    ];

    const REQUEST = [];
}

