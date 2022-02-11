<?php
require "connect.php";

$sql= $conn->query("CREATE or replace table status_ict_irrigation as select gp_vc_id, gp_vc_name , block_name , district_name from
jurisdiction_gp_vc,jurisdiction_district,jurisdiction_block where jurisdiction_gp_vc.block_id = jurisdiction_block.block_id and
jurisdiction_block.district_id = jurisdiction_district.district_id;");

$sql = $conn->query("ALTER TABLE status_ict_irrigation ADD status_irrigation varchar(3)");
$sql = $conn->query("ALTER TABLE status_ict_irrigation ADD status_ict varchar(3)");

$sql = $conn->query("update status_ict_irrigation set status_irrigation = 'NO'");
$sql = $conn->query("update status_ict_irrigation set status_ict = 'NO'");

$sql = $conn->query("update status_ict_irrigation set status_irrigation = 'YES' where gp_vc_name in(select gp_vc from irrigation_schemes) ");
$sql = $conn->query("update status_ict_irrigation set status_ict = 'YES' where gp_vc_name in(select gp_vc_name from ict_status_gp_vc)");

$sql= $conn->query("SELECT * FROM status_ict_irrigation");
// $sql1 = $conn->query("SELECT gp_vc_id from status where gp_vc_id in(SELECT gp_vc_id from irrigation_schemes)");
// while($row1s = $sql1->fetch(PDO::FETCH_ASSOC))
// {
// $row1s['gp_vc_id']
// }
// $sql2 = $conn->query("SELECT gp_vc_id from status where gp_vc_id in(SELECT gp_vc_id from ict_status_gp_vc)");


?>