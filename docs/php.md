###PHP

    <?php
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8888",
      CURLOPT_URL => "http://127.0.0.1:8888/",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "[\n\t{\n\t    \"origin\": \"Madrid\",\n\t    \"destination\": \"Barcelona\",\n\t    \"transport-type\": \"train\",\n\t    \"transport-number\": \"78A\",\n\t    \"seat\": \"45B\",\n\t    \"baggage-handdle\": false\n\t},\n\t{\n\t    \"origin\": \"New York JFK\",\n\t    \"destination\": \"Mexico\",\n\t    \"transport-type\": \"airplane,\",\n\t    \"transport-number\": \"SK24\",\n\t    \"seat\": \"5B\",\n\t    \"gate\" : \"6\",\n\t    \"baggage-handdle\": true\n\t},\n\t{\n\t    \"origin\": \"Gerona Airport\",\n\t    \"destination\": \"Stockholm\",\n\t    \"transport-type\": \"airplane\",\n\t    \"transport-number\": \"SK455\",\n\t    \"seat\": \"3A\",\n\t    \"gate\" : \"45B\",\n\t    \"baggage-drop\": \"344\"\n\t},\n\t{\n\t    \"origin\": \"Barcelona\",\n\t    \"destination\": \"Gerona Airport\",\n\t    \"transport-type\": \"bus\",\n\t    \"baggage-handdle\": false\n\t},\n\t{\n\t    \"origin\": \"Stockholm\",\n\t    \"destination\": \"New York JFK\",\n\t    \"transport-type\": \"airplane,\",\n\t    \"transport-number\": \"SK22\",\n\t    \"seat\": \"7B\",\n\t    \"gate\" : \"22\",\n\t    \"baggage-handdle\": true\n\t}\n]",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }