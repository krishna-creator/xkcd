<?php
$rand=rand(0,650);
// Read JSON file
$api_url = 'http://xkcd.com/'.$rand.'/info.0.json';
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data,JSON_PRETTY_PRINT);
$img = $response_data['img'];
$script=$response_data['transcript'];
$script=preg_replace('/\[[^]]+\]]/','',$script);
$script=preg_replace('/\{[^]]+\}}/','',$script);
$script=str_replace("\n",'<br>',$script);

echo '<img src="'.$img.'"><br><p>'.$script.'</p>';
?>