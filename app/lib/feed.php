<?php

    function get_rss_feed($RSS_URL,$RSS2JSON_API_KEY)
    {
        $api_endpoint = 'https://api.rss2json.com/v1/api.json?rss_url='.urlencode($RSS_URL).'&api_key='.$RSS2JSON_API_KEY;
        $data = json_decode( file_get_contents($api_endpoint), true );
        return $data;
    }
