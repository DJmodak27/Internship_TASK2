<?php
require "connect.php";
require "queries.php";

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

  <title>Status of Irrigation Schemes and ICT</title>
</head>

<body>
  <?php

  ?>
  <div class="container my-4">
    <h2 style="text-align:center;">Status of Irrigation Schemes and ICT </h2>
    <form action="main.php" method="GET">
    </form>
  </div>
  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
        <th scope="col">S.No.</th>
        <th scope="col">GP VC Name</th>
        <th scope="col">Block Name</th>
        <th scope="col">District Name</th>
        <th scope="col">Status of Irrigation Schemes</th>
        <th scope="col">Status of ICT</th>
        </tr>
      </thead>
       <?php
       $Sno=1;

                    while($rows = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                      if($rows["status_irrigation"]=="YES" && $rows["status_ict"]=="YES"){
                        echo '
                          <tr>
                            <td>'.$Sno.'</td>
                            <td>'.$rows["gp_vc_name"].'</td>
                            <td>'.$rows["block_name"].'</td>
                            <td>'.$rows["district_name"].'</td>
                            <td><a href="/PMS/STATUS/irrigation.php?key='.$rows["gp_vc_id"].' ">'.$rows["status_irrigation"].'</a></td>
                            <td><a href="/PMS/STATUS/ict.php?key='.$rows["gp_vc_id"].' ">'.$rows["status_ict"].'</a></td>
                        </tr>
                        ';
                      }
                      elseif($rows["status_irrigation"]=="NO" && $rows["status_ict"]=="YES"){
                        echo '
                          <tr>
                            <td>'.$Sno.'</td>
                            <td>'.$rows["gp_vc_name"].'</td>
                            <td>'.$rows["block_name"].'</td>
                            <td>'.$rows["district_name"].'</td>
                            <td>'.$rows["status_irrigation"].'</a></td>
                            <td><a href="/PMS/STATUS/ict.php?key='.$rows["gp_vc_id"].'">'.$rows["status_ict"].'</a></td>
                        </tr>
                        ';
                      }
                      elseif($rows["status_irrigation"]=="YES" && $rows["status_ict"]=="NO"){
                        echo '
                          <tr>
                            <td>'.$Sno.'</td>
                            <td>'.$rows["gp_vc_name"].'</td>
                            <td>'.$rows["block_name"].'</td>
                            <td>'.$rows["district_name"].'</td>
                            <td><a href="/PMS/STATUS/irrigation.php?key='.$rows["gp_vc_id"].'">'.$rows["status_irrigation"].'</a></td>
                            <td>'.$rows["status_ict"].'</a></td>
                        </tr>
                        ';
                      }
                      else {
                      echo '
                          <tr>
                            <td>'.$Sno.'</td>
                            <td>'.$rows["gp_vc_name"].'</td>
                            <td>'.$rows["block_name"].'</td>
                            <td>'.$rows["district_name"].'</td>
                            <td>'.$rows["status_irrigation"].'</a></td>
                            <td>'.$rows["status_ict"].'</a></td>
                        </tr>
                        ';
                      $Sno +=1;
                      }
                    }
                    ?>
  </div>
  <hr>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  
  </script>
</body>

</html>