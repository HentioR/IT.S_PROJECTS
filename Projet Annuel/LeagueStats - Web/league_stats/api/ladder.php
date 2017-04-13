<?php
require('./config.php');
require('../skeleton/skeleton.html');
?>


<head>
  <title>Challenger Tier</title>
  <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/ladder.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/league_stats/theme/css/progress.css">

</head>




<?php
/* Request Challenger tier */
$challenger = $lol->getChallengerLeague();
$result = json_encode($challenger, true);
$result = $challenger->entries;
$sum = $result[0];


/* Array sort */
function cmp($a, $b) {
  return $a->leaguePoints < $b->leaguePoints;
}

?>

<div class="iconeFull2">
<?php echo "<img class='chall' src='../theme/images/challenger.png' />";?>
</div>

<div class="container">
  <div class="row" >
    <div class="col-lg-12">
      <h1 class="title">Classements</h1>


      <form action="#" id="form2" method="get" >
        <input type="text"  id="q" name="q" placeholder="Nom d'invocateur" required>
      </form>

      </div>
    </div>
    <hr>

    <div class="row" >
      <div class="col-lg-12">
        <div class="ladder">
          <table id="table" class="pure-table pure-table-horizontal tablesorter">
            <thead>
              <tr class="pure-table-odd">
                <th><a href="">#</a></th>
                <th><a href="">Invocateur</a></th>
                <th><a href="">LP</a></th>
                <th><a href="">Ratio victoire</a></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <?php
                usort($result, "cmp");

                for ($i=1; $i < 200; $i++) {
                  $sum = $result[$i];
                  $summonerName = $sum->playerOrTeamName;
                  $lp = $sum->leaguePoints;
                  $wins = $sum->wins;
                  $losses = $sum->losses;
                  $ratio = intval(($wins/($wins+$losses))*100);

                  if ($i%2) {
                    echo '<tr class="pure-table-odd">';
                  }
                  else {
                    echo "<tr>";
                  }
                  echo "<td class='tdId'>".$i;
                  echo "<td>"."<img class='sumIcone' src='http://avatar.leagueoflegends.com/euw/$summonerName.png' />".$summonerName."</td>";
                  echo "<td>".$lp."</td>";
                  if ($ratio > 55) {
                    echo "<td>"."<div class='w3-light-grey' style='width:140px'>"."<div class='w3-container w3-blue w3-center' style='width:$ratio%'>$ratio%</div>"."</div>"."</td>";

                  }elseif ($ratio <50) {
                    echo "<td>"."<div class='w3-light-grey' style='width:140px'>"."<div class='w3-container w3-red w3-center' style='width:$ratio%'>$ratio%</div>"."</div>"."</td>";

                  }elseif ($ratio >= 50 && $ratio <= 55) {
                    echo "<td>"."<div class='w3-light-grey' style='width:140px'>"."<div class='w3-container w3-green' style='width:$ratio%'>$ratio%</div>"."</div>"."</td>";

                  }

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
    <div class="footerPage">
      <div class="container">
      <p class="copyright">© 2017 League Stats Data based on League of legends</p>
    </div>
    </div>

    <script type="text/javascript" src="../theme\script\js\jquery-2.2.3.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" href="http://localhost/league_stats/theme/script/js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" href="http://localhost/league_stats/theme/script/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" href="http://localhost/league_stats/theme/script/js/mdb.min.js"></script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script>
    jQuery(document).ready(function($){
      var $rows = $('tbody tr');
      $('#q').keyup(function() {
          var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

          $rows.show().filter(function() {
              var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
              return !~text.indexOf(val);
          }).hide();
      });
      function OrderBy(a,b,n) {
    if (n) return a-b;
    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
}
$('th a').click(function() {
    var $th = $(this).closest('th');
    $th.toggleClass('selected');
    var isSelected = $th.hasClass('selected');
    var isInput= $th.hasClass('input');
    var column = $th.index();
    var $table = $th.closest('table');
    var isNum= $table.find('tbody > tr').children('td').eq(column).hasClass('num');
    var rows = $table.find('tbody > tr').get();
    rows.sort(function(rowA,rowB) {
        if (isInput) {
            var keyA = $(rowA).children('td').eq(column).children('input').val().toUpperCase();
            var keyB = $(rowB).children('td').eq(column).children('input').val().toUpperCase();
        } else {
            var keyA = $(rowA).children('td').eq(column).text().toUpperCase();
            var keyB = $(rowB).children('td').eq(column).text().toUpperCase();
        }
        if (isSelected) return OrderBy(keyA,keyB,isNum);
        return OrderBy(keyB,keyA,isNum);
    });
    $.each(rows, function(index,row) {
        $table.children('tbody').append(row);
    });
    return false;
});
    });
    </script>
