<?php
    // JSON ডাটা (API থেকে সরাসরি আসবে)
    $json = file_get_contents("https://live8.bmd.gov.bd/bmd_web/json/postRequests");

    $data = json_decode($json, true);

    $weatherData = [];
    $forecasts = $data['data']['Forecast'];

    foreach ($forecasts as $forecast) {
        $weatherData[] = [
            'pointname' => $forecast['pointname'],
            'timeUpdate' => $forecast['timeUpdate'],
            'weather' => $forecast['weather'],
            'sunrise' => $forecast['sunrise'],
            'sunset' => $forecast['sunset'],
            'max' => $forecast['maxtemp'],
            'min' => $forecast['mintemp']
        ];
        // point_id
        // pointname
        // timeUpdate
        // weather
        // weather_icon
        // sunrise
        // sunset
        // maxtemp
        // mintemp
        // rainfall
        // wind
        // mHumidity
        // eHumidity
        // SurPresure
        // tnmaxtem
        // tnmintem
    }


    // JSON আকারে দেখানো
    header('Content-Type: application/json');
    echo json_encode($weatherData, JSON_PRETTY_PRINT);
?>
