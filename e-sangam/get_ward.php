<?php

include_once 'db_con.php';
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($con, "SELECT ward_no,w_id FROM ward where p_id='" . $index . "'");
    //var_dump($q);
    $str = "";
    while ($row = mysqli_fetch_array($q)) {
       // $str .= $row['ward_no'] . ",";
		$str .= $row['w_id'].":" .$row['ward_no'] . ",";
    }
    echo rtrim($str, ',');
}


