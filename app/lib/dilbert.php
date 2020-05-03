<?php
function get_dilbert_comic()
{
    $img = '/asset/img/dilbert.png';
    $year = date('Y');
    $month = date('m');
    $day = date('d');

    $url = "https://www.gocomics.com/dilbert-en-espanol/$year/$month/$day";

    $content = file_get_contents($url);

    try {
      libxml_use_internal_errors(true); // Prevent HTML errors from displaying
      $dom = new DomDocument();
      $dom->loadHTML($content);
      $xpath = new DOMXpath($dom);
      $metas = $dom->getElementsByTagName('meta');
      if($metas)
      foreach($metas as $meta) {
        if($meta->getAttribute('property') == 'og:image')
        {
          $img = $meta->getAttribute('content');
          break;
        }
      }
    } catch (\Exception $e) {
        //Dilbert not found :(
    }
    return $img;
}
