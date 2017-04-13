<?php
require('lol.api.php');

$region = 'euw';
$lol=new LeagueOfLegends('RGAPI-d8742a25-db1a-4d09-8ddf-b8745568bc22',$region);

function parseSummonerName($name){
	return htmlspecialchars(mb_strtolower(str_replace(" ", "",$name), 'UTF-8'));
}
?>
