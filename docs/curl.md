### CURL

    curl --request POST \
      --url http://127.0.0.1:8888/ \
      --header 'content-type: application/json' \
      --data '[
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
    ]'