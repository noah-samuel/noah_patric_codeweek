<?php

        printf("        Suchbegriff       (Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchanfrage mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor) \n");
        $title = readline(); //Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchbegriff mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor)
        printf("Anzahl Ergebnisse \n");
        $maxResults = readline();  //Eine Nummer setzen. Z.B. 5;
        printf("Sortierung angezeigter Videos: date, videoCount, viewCount, relevance, title \n");
        $order = readline(); //Zum Beispiel: date, videoCount, viewCount, relevance, title einsetzbar. Sortiert erhaltene Informationen nach diesen Eigenschaften;
        printf("Videolänge: any, short, medium, long \n");
        $videoduration = readline();  //Zum Beispiel: any, short, medium, long einsetzbar;
        printf("Dein API key: \n");
        $key = readline(); //Dein API-Key;


$curl_session = curl_init();
//step2
curl_setopt($curl_session, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&format=json&q=$title&order=$order&videoDuration=$videoduration&key=$key");
//step3
$result = curl_exec($curl_session);
//step4
curl_close($curl_session);
//step5
echo $result;

$url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&format=json&q=$title&order=$order&videoDuration=$videoduration&key=$key";


// Abhängig von der API, hier json
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);
$url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&format=json&q=$title&order=$order&videoDuration=$videoduration&key=$key";


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
