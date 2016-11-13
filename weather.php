<?php

$xml = simplexml_load_file("http://forecast.weather.gov/MapClick.php?lat=41.282765&lon=-74.932740&unit=0&lg=english&FcstType=dwml");
          
//forcast data
$dataforcast = $xml->data[0];
$parameters = $dataforcast->parameters;

//now data
$datanow = $xml->data[1];
$parametersnow = $datanow->parameters;

//actual temperature now
$tempsactual = $parametersnow->temperature[0];
$tempactual = $tempsactual->value;

//low temp tomorrow
$type = $parameters->temperature[0]->attributes()->type;
$value1 = $parameters->temperature[0];
$value1 = $value1->value[1];

//high temp tomorrow
$value2 = $parameters->temperature[1];
$value2 = $value2->value[1];

//find minimum and maximum temps
if($type == "minimum")
{
$lowtomorrow = $value1;
$hightomorrow = $value2;
}
else
{
$lowtomorrow = $value2;
$hightomorrow = $value1;
}

//humidity
$humidityp = $parametersnow->humidity;
$humidity = $humidityp->value;

//wind speed
$windsp = $parametersnow->{'wind-speed'}[1];
$windspeed = $windsp->value;

//weather forcast tomorrow
$weather = $parameters->weather;
$forecasts = $weather->{'weather-conditions'}[2];
$tomorrowforcast = $forecasts['weather-summary'];


echo "$";
echo $tempactual;
echo ",";
echo $hightomorrow;
echo ",";
echo $lowtomorrow;
echo ",";
echo $humidity;
echo ",";
echo $windspeed;
echo ",";
echo $tomorrowforcast;



?> 