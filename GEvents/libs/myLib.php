<?php
 function dbConnect() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "mda";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function salir($str, $code) {
    echo '<script>
            alert("' . $str . '");
            location.href= " ' . $_SERVER['HTTP_REFERER'] . '";
        </script>';
    return $code;
}