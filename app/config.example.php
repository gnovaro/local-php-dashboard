<?php
    $name = 'Tavo';

    // For Temperature
    $OPEN_WEATHER_API_KEY = '';
    $CITY = 'Castelldefels';
    $STATE = 'Barcelona';
    $COUNTRY = 'es';
    $UNITS = 'metric';

    $OPEN_WEATHER_API_CALL_URL = "https://api.openweathermap.org/data/2.5/weather?q=$CITY,$STATE,$COUNTRY&appid=$OPEN_WEATHER_API_KEY&units=$UNITS";
