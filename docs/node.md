###NODE

    var http = require("http");
    
    var options = {
      "method": "POST",
      "hostname": "127.0.0.1",
      "port": "8888",
      "path": "/",
      "headers": {
        "content-type": "application/json"
      }
    };
    
    var req = http.request(options, function (res) {
      var chunks = [];
    
      res.on("data", function (chunk) {
        chunks.push(chunk);
      });
    
      res.on("end", function () {
        var body = Buffer.concat(chunks);
        console.log(body.toString());
      });
    });
    
    req.write(JSON.stringify([ { origin: 'Madrid',
        destination: 'Barcelona',
        'transport-type': 'train',
        'transport-number': '78A',
        seat: '45B',
        'baggage-handdle': false },
      { origin: 'New York JFK',
        destination: 'Mexico',
        'transport-type': 'airplane,',
        'transport-number': 'SK24',
        seat: '5B',
        gate: '6',
        'baggage-handdle': true },
      { origin: 'Gerona Airport',
        destination: 'Stockholm',
        'transport-type': 'airplane',
        'transport-number': 'SK455',
        seat: '3A',
        gate: '45B',
        'baggage-drop': '344' },
      { origin: 'Barcelona',
        destination: 'Gerona Airport',
        'transport-type': 'bus',
        'baggage-handdle': false },
      { origin: 'Stockholm',
        destination: 'New York JFK',
        'transport-type': 'airplane,',
        'transport-number': 'SK22',
        seat: '7B',
        gate: '22',
        'baggage-handdle': true } ]));
    req.end();