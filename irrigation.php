<?php
require "connect.php";
$value=$_GET['key'];
// echo "$value";


$sql=$conn->prepare("SELECT * from irrigation_schemes where gp_vc_id  = ? ");
$sql->execute([$value]);
while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
    $li_schemes = $row['li_schemes'];
    $nli_schemes = $row["nli_schemes"];
    $dtw_schemes =$row["dtw_schemes"];
    $ndtw_schemes = $row["ndtw_schemes"];
    $panchayat = $row["panchayat"];
    $pwd = $row["pwd"];
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

    <title>Irrigation Schemes</title>
    <style>
      input[type=submit] {
        background-color: #0000FF;
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
        <h2 class="text-center">Status of Irrigation Schemes</h2>
        <p style="color:red;"><span class="error" >* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="mb-3">
                <label for="li_schemes" class="form-label">Total No. of LI (irrigation) schemes available <a style="color:red;">*</a></label>
                <input type="number" class="form-control" id="li_schemes" name="li_schemes" value="<?php echo $li_schemes; ?>" readonly>
                
            </div>
            <div class="mb-3">
                <label for="nli_schemes" class="form-label">Name of LI schemes <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="nli_schemes" name="nli_schemes" value="<?php echo $nli_schemes; ?>" readonly>

            </div>
            <div class="mb-3">
                <label for="dtw_schemes" class="form-label">Total No. of DTW (irrigation) schemes available <a style="color:red;">*</a></label>
                <input type="number" class="form-control" id="dtw_schemes" name="dtw_schemes" value="<?php echo $dtw_schemes; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ndtw_schemes" class="form-label">Name of DTW schemes <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="ndtw_schemes" name="ndtw_schemes" value="<?php echo $ndtw_schemes; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="panchayat" class="form-label">Name of Part time pump operator engaged by the Panchayat Department <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="panchayat" name="panchayat" value="<?php echo $panchayat; ?>" readonly>

            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Name of Part time pump operator engaged by the PWD (WR) Department <a style="color:red;">*</a></label>
                <input type="text" class="form-control" id="pwd" name="pwd" value="<?php echo $pwd; ?>" readonly>
            </div> 
        </form>
    </div>
    
    
</body>

</html>