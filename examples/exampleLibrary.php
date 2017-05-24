<?php
require __DIR__ . '/../vendor/autoload.php';

use SimplePhpApi\Builder;

$input = [
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

//builder
$builder = new Builder();
//Set parameters in the builder
$request = $builder
    ->setInput($input)
;

//Return instance of the Request according the parameters
$method = $request->build();

//Process the request and get message
$message = $method
    ->process()
    ->getMessage()
;

//print result
var_dump($message);