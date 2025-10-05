<?php
    $html = file_get_contents("https://live8.bmd.gov.bd/");

    libxml_use_internal_errors(true);
    $dom = new DOMDocument;
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xPath = new DOMXPath($dom);

    $weatherData = [];
    $x = $xPath->query('//marquee');
    var_dump($x->item(0)) ;
    exit();
    foreach ($xPath->query('//marquee//span[@class="dis_info"]') as $info) {
        $district = trim($info->getElementsByTagName('strong')[0]->nodeValue);
        preg_match('/MAX ([\d.]+)/', $info->textContent, $maxMatch);
        preg_match('/MIN ([\d.]+)/', $info->textContent, $minMatch);
        preg_match('/Sunrise: ([\d:AMP]+)/', $info->textContent, $sunriseMatch);
        preg_match('/Sunset: ([\d:AMP]+)/', $info->textContent, $sunsetMatch);

        $weatherData[] = [
            'district' => $district,
            'max' => $maxMatch[1] ?? null,
            'min' => $minMatch[1] ?? null,
            'sunrise' => $sunriseMatch[1] ?? null,
            'sunset' => $sunsetMatch[1] ?? null,
        ];
    }

    // JSON আকারে দেখানো
    // header('Content-Type: application/json');
    // echo json_encode($weatherData, JSON_PRETTY_PRINT);
?>