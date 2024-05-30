<?php
//cURL GET method
// sources: https://openweathermap.org/api -> Current weather data
// First - read API call, я выбрала -> Built-in API request by city name -> https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}
// Second, make cURL шаблон for GET request
//нам нужно Parameters: q, appid, mode, units, lang. Это написано под API call in documentation
//My API key: b2ccafa3fce1a80a7385b887fd17c460 (from website, need to be registrated)

$url = 'http://api.openweathermap.org/data/2.5/weather'; //2.5 API version, parameter - weather. Это то, что идёт до ? в документации как вызвать АПИ и http без с

$options = array(
    'q' => 'London',
    'APPID' => 'b2ccafa3fce1a80a7385b887fd17c460',
    'units' => 'metric',
    'lang' => 'en',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //returntr.. значит, что ответ, который получит скрипт мы еще обработаем сами, что не надо его сразу выводить на страницу и можно поставить 1 можно тру
// настраиваем урл куда будем стучаться
curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($options));

$response = curl_exec($ch);

//eto pishem posle togo, kak ostaljnoj kod napisali i viveli print_r dlja proverki
$data = json_decode($response,true);//true чтоб создать массив из длинной нашей строки, которую видно в принт_р
//теперь добавляем print_r($data);

curl_close($ch);

echo '<pre>';
print_r($response);
print_r($data); // теперь можно закомментировать или убрать принт_р(респонс)


?>