<?php
require('./config.php');
require('../skeleton/skeleton.html');
?>
<script type="text/javascript" src="../theme/script/js/jquery-2.2.3.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" href="http://localhost/league_stats/theme/script/js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" href="http://localhost/league_stats/theme/script/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" href="http://localhost/league_stats/theme/script/js/mdb.min.js"></script>

<?php
$region = $_GET['region'];
$lol=new LeagueOfLegends('RGAPI-d8742a25-db1a-4d09-8ddf-b8745568bc22',$region);
$summoner=parseSummonerName($_GET['summoner']);

$summonerdata=$lol->getSummonerByName($summoner);

if(property_exists($summonerdata,'status'))
exit(var_dump($summonerdata));

$SummonerID=$summonerdata->$summoner->id;
$SummonerName=$summonerdata->$summoner->name;

$stats=$lol->getSummonerStats($summonerdata->$summoner->id);
$info = json_encode($stats, true);

$info = $stats->playerStatSummaries;
$mod = $info[0];
$gameMode = $mod->playerStatSummaryType;
$sub = $mod->aggregatedStats;

?>

<head>
	<title><?php echo $SummonerName."- Résultat de recherches d'invocateurs";?></title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/ladder.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/progress.css">
</head>

<div class="iconeFull">
<?php echo "<img class='avatar' src='http://avatar.leagueoflegends.com/euw/$SummonerName.png' />";?>
</div>
<div class="container">
	<div class="row" >
		<div class="col-lg-12">
			<h1 class="title"><?php echo $SummonerName." - ".strtoupper($region);?></h1>


		</div>
	</div>
	<hr>

	<div class="row" >
		<div class="col-lg-12">
			<div class="ladder">
				<table id="table" class="pure-table pure-table-horizontal">
					<thead>
						<tr class="pure-table-odd">
							<th>Mode de jeu</th>
							<th>Victoire</th>
							<th>Tués</th>
							<th>Assistances</th>
							<th>Minions</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<?php
							function nhp($a, $b) {
							  return $a->wins < $b->wins;
							}

							usort($info, "nhp");
							for ($i=0; $i < 10; $i++) {
								$mod = $info[$i];
								$sub = $mod->aggregatedStats;
								$gameMode = $mod->playerStatSummaryType;
								$win = $mod->wins;

								if (array_key_exists('totalMinionKills', $sub)) {
										$minion = $sub->totalMinionKills;
								}else {
									$minion = "0";
								}

								if (array_key_exists('totalChampionKills', $sub)) {
										$kills = $sub->totalChampionKills;
								}else {
									$kills = "0";
								}

								if (array_key_exists('totalAssists', $sub)) {
										$assist = $sub->totalAssists;
								}else {
									$assist = "0";
								}

								if ($i%2) {
									echo '<tr class="pure-table-odd">';
								}
								else {
									echo "<tr>";
								}
								echo "<td class='tdId'>".$gameMode."</td>";
								echo "<td class='tdId'>".$win."</td>";
								echo "<td class='tdId'>".$kills."</td>";
								echo "<td class='tdId'>".$assist."</td>";
								echo "<td class='tdId'>".$minion."</td>";

								echo "</tr>";
							}
							?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="footerPage" style="margin-top:247px;">
	<div class="container">
		<p class="copyright">© 2017 League Stats Data based on League of legends</p>
	</div>
</div>
