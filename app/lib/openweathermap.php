<?php
function get_current_weather($OPEN_WEATHER_API_CALL_URL)
{
    $weather_json = null;
    try {
        $content = file_get_contents($OPEN_WEATHER_API_CALL_URL);
        $weather_json = json_decode($content);
    } catch (\Exception $e) {

    }
    return $weather_json;
}
