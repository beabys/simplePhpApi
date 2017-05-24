Simple Api for TRIP SORTER
=============
## Description of the project

* [Definition](./definition.md)

# Installing

### Install Dependencies

    composer install

## Running the test

    vendor/bin/phpunit test/
    
## Starting the server application

    php -S 127.0.0.1:8888 examples/exampleServer.php
    
## Starting the server application

    php -S 127.0.0.1:8888 examples/exampleServer.php

## Request POST Method

| Parameter | Type | Description |
| --- | --- | --- |
| origin | String | Origin |
| destination | String | Destination |
| transport-type | String | Type of transportation <br \>airplane, bus, train, ship |
| seat | String | (optional) Seat in Transportation |
| gate | String | (optional) Content  Gate to take the transport |
| baggage-drop | String | (optional) Place to drop the baggage in destination |
| baggage-handdle | Boolean | (optional) Baggage handle by Transportation Company |


## Response

| Parameter | Type  | Description |
| --- | --- | --- |
| Success | Boolean | true/false  |
| message| Object  | Message of the response |
| original| Object  | (optional) Array of the Request |
| sorted| Object  | (optional) Array Sorted |
| Error | String  | (optional) Status of the message. |
| code | Integer  | (optional) Code of the Error  <br /> `message` : Message or the error. <br />`code` : code of the error |

## Response Codes

| Response Codes | Definition | Description |
| --- | --- | --- |
| 200 | OK | The request have ben processed and show response |
| 400 | Bad Request | Invalid Request |
| 500 | Internal Server Error | Internal Server Error |

## Integration

  Set the input parameters (need to be an Json Object) at the endpoint http://127.0.0.1:8888 using the POST Method
  
  example:
  
    [
    	{
    	    "origin": "Madrid",
    	    "destination": "Barcelona",
    	    "transport-type": "train",
    	    "transport-number": "78A",
    	    "seat": "45B",
    	    "baggage-handdle": false
    	},
    	{
    	    "origin": "New York JFK",
    	    "destination": "Mexico",
    	    "transport-type": "airplane,",
    	    "transport-number": "SK24",
    	    "seat": "5B",
    	    "gate" : "6",
    	    "baggage-handdle": true
    	},
    	{
    	    "origin": "Gerona Airport",
    	    "destination": "Stockholm",
    	    "transport-type": "airplane",
    	    "transport-number": "SK455",
    	    "seat": "3A",
    	    "gate" : "45B",
    	    "baggage-drop": "344"
    	},
    	{
    	    "origin": "Barcelona",
    	    "destination": "Gerona Airport",
    	    "transport-type": "bus",
    	    "baggage-handdle": false
    	},
    	{
    	    "origin": "Stockholm",
    	    "destination": "New York JFK",
    	    "transport-type": "airplane,",
    	    "transport-number": "SK22",
    	    "seat": "7B",
    	    "gate" : "22",
    	    "baggage-handdle": true
    	}
    ]
    
## Integrations

For examples of integrations check the follows documents:

* [Curl](./curl.md)
* [PHP](./php.md)
* [Node](./node.md)

## Author

This Simple Api Service was created by Alfonso Rodriguez ([@beabys](http://twitter.com/beabys)).
