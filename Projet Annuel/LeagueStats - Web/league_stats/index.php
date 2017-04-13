<?php
  require('./skeleton/skeleton.html');
?>

<title>League Stats</title>

<body>



<div class="view hm-black-strong">
  <div class="container">
      <div class="row" id="home">
          <div class="col-lg-12">
              <div class="description flex-center">
                <form action="api/getSummonerAll.php" class="form" method="get">
                  <div class="header">
                   <p>League Stats</p>
                  </div>
                  <div class="description">
                    <p>Entrer votre nom d'invocateur et accéder dès maintenant à vos statistiques League of Legends !</p>
                  </div>
                  <div class="inputStyle">
                    <input type="text" class="button" id="email" name="summoner" placeholder="Nom d'invocateur" required>
                    <select class="select" name="region">
                      <option value="euw" selected>EUW</option>
                      <option value="na">NA</option>
                    </select>
                    <input type="submit" class="button" id="submit" value="OK">
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>


</body>
<!--<br><a href="api/getSummoner.php?summoner=carlos170586">getSummoner()</a>: Retrieve Runes/Masteries by Summoner/s (<a href="api/getSummonerArray.php?summoner[]=carlos170586&summoner[]=carlos1705860015">multiple summoner example</a>).
<br><a href="api/getTeams.php?summoner=carlos170586">getTeams()</a>: Retrieve Teams by Summoner/s.
<br><a href="api/getSummonerStats.php?summoner=carlos170586">getSummonerStats()</a>: Retrieve Summoner Stats.
-->
