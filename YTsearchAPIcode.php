<?php

        printf("   Suchbegriff   (Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchanfrage mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor) \n");
        $title = readline(); //Zum Beispiel: Championsleague, SRF, GTA, Fifa; (Bei Suchbegriff mit mehreren Wörtern, zwischen jedem wort ein '+' setzen. Z.B. Cristiano+Ronaldo+Freistoss+Tor)
        printf("Anzahl Ergebnisse \n");
        $maxResults = readline();  //Eine Nummer setzen. Z.B. 5;
        printf("Sortierung angezeigter Ergebnisse: date, videoCount, viewCount, relevance, title \n");
        $order = readline(); //Zum Beispiel: date, videoCount, viewCount, relevance, title einsetzbar. Sortiert erhaltene Informationen nach diesen Eigenschaften;
        printf("Videolänge: any, short, medium, long \n");
        $videoduration = readline();  //Zum Beispiel: any, short, medium, long einsetzbar;
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
    print "\n\n\n\n\n";
print ($item ["snippet"] ["title"] . "\n\n");
print ($item ["snippet"] ["channelTitle"] . "\n\n");
print ($item ["snippet"] ["publishedAt"] . "\n");
print ($item ["id"] ["kind"] . "\n\n");
print ($item ["id"] ["videoId"] . "\n");
print ($item ["snippet"] ["channelId"] . "\n\n");
print ($item ["snippet"] ["thumbnails"] ["high"] ["url"]);
}

