<?php

echo "\n\n\n";
        printf("Suchbegriff (Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchanfrage mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor) \n\n");
        $title = readline(); //Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchbegriff mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor)
        echo "\n";
        printf("Anzahl Ergebnisse (Zahl) \n\n");
        $maxResults = readline();  //Eine beliebige Nummer eingeben. Z.B. 5;
        echo "\n";
        printf("Sortierung angezeigter Ergebnisse: (date, viewCount, relevance, title) \n\n");
        $order = readline(); //Zum Beispiel: date, viewCount, relevance, title einsetzbar. Sortiert erhaltene Informationen nach diesen Eigenschaften;
        echo "\n";
        printf("Videolänge: (any) \n\n");
        $videoduration = readline();  //Zum Beispiel: any einsetzbar;
        $key = "AIzaSyDNvoF8RPPyjTatjiOxiLb1HFMSTG4IL6Y";



$curl_session = curl_init();

curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
//step2
curl_setopt($curl_session, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maxResults&format=json&q=$title&order=$order&videoDuration=$videoduration&key=$key");
//step3
$result = json_decode(curl_exec($curl_session), true);
//step4
curl_close($curl_session);
//step5
//print_r($result);
echo "\n\n";
foreach ($result["items"] as $item) {
    print "\n\n\n\n\n\n";
    print ("Title: " . $item ["snippet"] ["title"] . "\n\n");
    print ("Channel: " . $item ["snippet"] ["channelTitle"] . "\n\n");
    print ("Published at: " . $item ["snippet"] ["publishedAt"] . "\n");
    print ("kind: " . $item ["id"] ["kind"] . "\n\n");
    print ("Video ID: " . $item ["id"] ["videoId"] . "\n");
    print ("Channel ID: " . $item ["snippet"] ["channelId"] . "\n\n");
    print ("Thumbnail URL: " . $item ["snippet"] ["thumbnails"] ["high"] ["url"]);
}
