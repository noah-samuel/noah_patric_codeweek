<?php
    //code
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
​
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title> Projekt Codeweek</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=no">
</head>
​
<body>
<div class="wrapper">
    <img src="logo.png" alt="" height="100px">
    <div class="box">
        <input type="submit" id="check">
            <div class="search-box">
                <form method="GET">
                    <input type="text" name="q" placeholder="Type here...">
                    <label for="check" class="icon">
                    <i class="fas fa-search"></i> 
                    <?php
                        if(!empty($_GET["q"])){
                            $key = "AIzaSyAF98o-1B4vAX8wUPswd12L6oncMQbAiRc";
                            $curl_session = curl_init();
                            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
                            $q = $_GET["q"];
                            $q = urlencode($q);
                            $url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=10000&format=json&q=$q&order=relevance&videoDuration=any&key=$key";
                            curl_setopt($curl_session, CURLOPT_URL, $url);
                            $result = json_decode(curl_exec($curl_session), true);
                            curl_close($curl_session);
                        }
                    ?>
                </form>
            </label>
        </div>
    </div>
</div>
​
<div class="flexbox-container">
    <?php
        foreach ($result["items"] as $item) {
            $title = $item["snippet"]["title"];
            $channelTitle = $item["snippet"]["channelTitle"];
            $date = $item["snippet"]["publishedAt"];
            $thumbnail = $item["snippet"]["thumbnails"]["medium"]["url"];
            if( empty($item["id"]["videoId"]) ){
                $videolink = "https://www.youtube.com/channel/" . $item["id"]["channelId"];
            }else{
                $videolink = "https://youtube.com/watch?v=" . $item["id"]["videoId"];
            }
            echo "
            <a href='$videolink'><div class='flexbox-item flexbox-item'>
                <img src='$thumbnail' alt='krank'>
                <div class='text'>
                    <h1>$title</h1>
                    <p>$channelTitle</p>
                    <p>$date</p>
                </div>
            </div></a>";
        }
    ?>
​
</div>
​
<!-- ----------------------------------------------------------------------------------------------- -->
</body>
​
</html>
