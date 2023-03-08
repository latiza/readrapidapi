<?php
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://free-to-play-games-database.p.rapidapi.com/api/filter?tag=3d.mmorpg.fantasy.pvp&platform=pc",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: free-to-play-games-database.p.rapidapi.com",
		"X-RapidAPI-Key: 7e08a1dd1cmshc444092b3b32088p10426cjsn9d250ccd53c5"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
/*
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}*/

//echo $response;
$response_data = json_decode($response);
$game_data = $response_data;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Milán Milánovics</title>
</head>
<body>
<nav>
        <div class="navbar clear">
            <a href="" class="logo">Milán</a>
            <div class="menu-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="">menu 1</a></li>
                    <li><a href="">menu 2</a></li>
                    <li>
                        <span class="open-submenu">menu 3 </span>
                        <span class="arrow down"></span></span>
                        <ul>
                            <li><a href="">almenupont 1</a></li>
                            <li><a href="">almenupont 2</a></li>
                            <li><a href="">almenupont 3</a></li>
                            <li><a href="">almenupont 4</a></li>
                        </ul>
                    </li>
                    <li><a href="">menu 4</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container card-content" style="display: none">

    <?php
    foreach ($game_data as $game) { 
        echo " <div class=\"card\"><div class=\"card-header\"> ";    
        echo "<h3>".$game->title."</h3>";
        echo "<p>".$game->short_description."</p>";
        echo "<p><i>Url: ".$game->game_url."</i></p>";
        echo "</div><div class=\"card-body\"> ";
        echo "<img src=\"$game->thumbnail\">";
        echo "</div></div>";  
    }
    ?>
  
    </div>
 
    <!--Lapozó-->
    <div class="pagination">
        <li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
        <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
        <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
    </div> 
    <script src="script.js"></script>
</body>
</html>