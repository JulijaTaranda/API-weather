<?php
//cURL GET method
// sources: https://openweathermap.org/api -> Current weather data
// -> Built-in API request by city name -> https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}
//Parameters: q, appid, mode, units, lang. Это написано под API call in documentation


$url = 'http://api.openweathermap.org/data/2.5/weather'; 

$options = array(
    'q' => 'London',
    'APPID' => 'b2ccafa3fce1a80a7385b887fd17c460',
    'units' => 'metric',
    'lang' => 'en',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($options));

$response = curl_exec($ch);


$data = json_decode($response,true);
//print_r($data); for test

curl_close($ch);

echo '<pre>';
print_r($response);
print_r($data);


?>
