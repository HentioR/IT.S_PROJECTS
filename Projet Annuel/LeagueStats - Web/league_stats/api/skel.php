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


<head>
  <title>Challenger Tier</title>
  <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/ladder.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/progress.css">
</head>


<div class="container">
  <div class="row" >
    <div class="col-lg-12">
      <h1 class="title">Classements</h1>


      <form action="#" id="form2" method="get" >
        <input type="text"  id="q" name="q" placeholder="Nom d'invocateur" required>
        <button type="submit"  class="buttonSubmit">Rechercher</button
        </form>

      </div>
    </div>
    <hr>

    <div class="row" >
      <div class="col-lg-12">
        <div class="ladder">
          <table id="table" class="pure-table pure-table-horizontal">
            <thead>
              <tr class="pure-table-odd">
                <th>#</th>
                <th>Invocateur</th>
                <th>LP</th>
                <th>Ratio victoire</th>
              </tr>
            </thead>

            <tbody>
              <tr id="noresults" style="display: none;">
              <tr>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    <div class="footerPage">
      <div class="container">
      <p class="copyright">© 2017 League Stats Data based on League of legends</p>
    </div>
    </div>
