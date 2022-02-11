<?php
require "connect.php";
$value=$_GET['key'];
// echo "$value";

$sql=$conn->prepare("SELECT * from ict_status_gp_vc where gp_vc_id  = :gp_vc");
$sql->execute(array(":gp_vc"=>$value));

while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
    $gp_vcbuilding = $row['available_office_building'];
    $powersupply = $row["available_power_service_connection_office"];
    $functionalcomputer =$row["no_available_computer"];
    $functionalprinter = $row["no_available_printers"];
    $functionalups = $row["no_available_UPS"];
    $activeinternet = $row["available_internet_connection"];
}

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

    <title>Status of ICT and Panchayat Building</title>
    <style>
      input[type=submit] {
        background-color: blue;
        border: none;
        color: #fff;
        padding: 15px 30px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>

<body>

    <div class="container my-4">
        <h2 class="text-center">Status of ICT and Panchayat Building</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- <div class="mb-3">
                <label for="gp_vc" class="form-label">Name of GP/VC <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="gp_vc" name="gp_vc" value="<?php echo $gp_vc; ?>">
                <span class="error"><?php echo $gp_vcErr ?></span>
            </div> -->
            <div class="mb-3">
                <label for="gp_vcbuilding" class="form-label">Availability of GP/VC Office Building <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="gp_vcbuilding" name="gp_vcbuilding" value="<?php echo $gp_vcbuilding; ?>" readonly>

                <!-- <span class="error"><?php echo $gp_vcbuilding ?></span> -->
            </div>
            <div class="mb-3">
                <label for="nli_schemes" class="form-label">Availability of Power Service Connection in GP/VC office <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="powersupply" name="powersupply" value="<?php echo $powersupply; ?>" readonly>


                <!-- <span class="error"><?php echo $powersupply ?></span> -->
            </div>
            <div class="mb-3">
                <label for="functionalcomputer" class="form-label">No of Functional Computer available <a style="color:red;">*</a></label>
                <input type="number" class="form-control" id="functionalcomputer" name="functionalcomputer" value="<?php echo $functionalcomputer; ?>" readonly>
                <!-- <span class="error"> <?php echo $functionalcomputer ?></span> -->
            </div>
            <div class="mb-3">
                <label for="functionalprinter" class="form-label">No of Functional Printers available <a style="color:red;">*</a></label>
                <input type="number" class="form-control" id="functionalprinter" name="functionalprinter" value="<?php echo $functionalprinter; ?>" readonly>
                <!-- <span class="error"> <?php echo $functionalprinter ?></span> -->
            </div>
            <div class="mb-3">
                <label for="functionalups" class="form-label">No of Functional UPS available <a style="color:red;">*</a></label>
                <input type="number" class="form-control" id="functionalups" name="functionalups" value="<?php echo $functionalups; ?>" readonly>
                <!-- <span class="error"><?php echo $functionalups ?></span> -->
            </div>
            <div class="mb-3">
                <label for="activeinternet" class="form-label">Availability of active internet connection in GP/VC office <a style="color:red;">*</a></label>
               <input type="number" class="form-control" id="activeinternet" name="activeinternet" value="<?php echo $activeinternet; ?>" readonly>

                <!-- <span class="error"><?php echo $activeinternet ?></span> -->
            </div>
        </form>
    </div>


</body>

</html>