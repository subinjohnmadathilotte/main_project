<?php

include_once 'db_con.php';
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($con, "SELECT name FROM panchayath where d_id='" . $index . "'");
    //var_dump($q);
    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['name'] . ",";
    }
    echo rtrim($str, ',');
}
