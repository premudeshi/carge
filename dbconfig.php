<?php
$servername = "localhost:8889";
$username = "carge";
$password = "cargerUserAdmin";
$dbname = "carge";


function getInfo($servername, $username, $password, $dbname, $id)
{
    $orderInfo = '';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM orders WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            $orderInfo = $row["info"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    $orderInfo = json_decode($orderInfo, true);
    return $orderInfo;
}
