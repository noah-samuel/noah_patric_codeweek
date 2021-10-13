<?php

$title = "[TITLE]"; //for emxample: Championsleague, SRF, GTA, Fifa; (Bei Suchanfrage mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor)
$maxResults = "[NUMBER]";  //Eine Nummer setzen. Z.B. 5;
$key = "[GOOGLE API-KEY";  //Dein API-Key;
$order = "[ORDER FILTER]"; //Zum Beispiel: date, videoCount, viewCount, relevance, title einsetzbar. Sortiert erhaltene Informationen nach diesen Eigenschaften;
$videoduration = "[VIDEODURATION]"; //Zum Beispiel: any, short, medium, long einsetzbar;


$curl_session = curl_init();

curl_setopt($curl_session, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&format=json&order=$order&q=$title&videoDuration=$videoduration&key=$key");

$result = curl_exec($curl_session);

curl_close($curl_session);

echo $result;


$url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&order=$order&q=$title&videoDuration=any&key=$key";

// Abhängig von der API, hier json
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($code == 200) {
    $response = json_decode($response, true);
    print_r($response);
} else {
    echo 'error ' . $code;
}
