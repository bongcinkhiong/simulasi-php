<?php

// Adjust your database connection code if necessary
function dbConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e-ticketing";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function query($sql) {
    $conn = dbConnect();
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $conn->close();

    return $rows;
}

function updateTransactionStatus($orderId, $status) {
    $conn = dbConnect();
    $sql = "UPDATE order_detail SET status = '$status' WHERE id_order_detail = $orderId";
    $conn->query($sql);
    $conn->close();
}
?>
