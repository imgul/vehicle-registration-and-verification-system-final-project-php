<?php

function check_connection()
{
    echo "<h1>Connected successfully<h1>";
}

// Form Validation
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function db_connect()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'vrvs';

    $conn = mysqli_connect($servername, $username, $password, $database);
    return $conn;
}

function exist_user($conn, $email)
{
    $sql = "SELECT * FROM `users` WHERE email='$email'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num)
        return true;
    return false;
}

function exist_routes($conn, $viaCities, $depdate, $deptime)
{
    $sql = "SELECT * FROM `routes` WHERE route_cities='$viaCities' AND route_dep_date='$depdate' AND route_dep_time='$deptime'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num) {
        $row = mysqli_fetch_assoc($result);

        return $row["id"];
    }
    return false;
}

function exist_vehicle($conn, $number)
{
    $sql = "SELECT * FROM `vehicles` WHERE number='$number'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num) {
        $row = mysqli_fetch_assoc($result);
        return $row["id"];
    }
    return false;
}
function exist_company($conn, $name)
{
    $sql = "SELECT * FROM `companies` WHERE name='$name'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num) {
        $row = mysqli_fetch_assoc($result);
        return $row["id"];
    }
    return false;
}

// function exist_booking($conn, $customer_id, $route_id)
// {
//     $sql = "SELECT * FROM `bookings` WHERE customer_id='$customer_id' AND route_id='$route_id'";

//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);
//     if ($num) {
//         $row = mysqli_fetch_assoc($result);
//         return $row["id"];
//     }
//     return false;
// }

function bus_assign($conn, $busno)
{
    $sql = "UPDATE buses SET bus_assigned=1 WHERE bus_no='$busno'";
    $result = mysqli_query($conn, $sql);
}

function bus_free($conn, $busno)
{
    $sql = "UPDATE buses SET bus_assigned=0 WHERE bus_no='$busno'";
    $result = mysqli_query($conn, $sql);
}

function number_from_vehicle_id($conn, $id)
{
    $sql = "SELECT * from vehicles WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        return $row["number"];
    }
    return false;
}


function get_from_table($conn, $table, $primaryKey, $pKeyValue, $toget)
{
    $sql = "SELECT * FROM $table WHERE $primaryKey='$pKeyValue'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        return $row["$toget"];
    }
    return false;
}
