<?php
// Companies JSON
$compSql = "Select * from companies";
$resultcompSql = mysqli_query($conn, $compSql);
$arr = array();
if (mysqli_num_rows($resultcompSql))
    while ($row = mysqli_fetch_assoc($resultcompSql))
        $arr[] = $row;
$companyJson = json_encode($arr);

// Companies JSON
$vehiclesSql = "Select * from vehicles";
$resultvehiclesSql = mysqli_query($conn, $vehiclesSql);
$arr = array();
if (mysqli_num_rows($resultvehiclesSql))
    while ($row = mysqli_fetch_assoc($resultvehiclesSql))
        $arr[] = $row;
$vehiclesJson = json_encode($arr);
