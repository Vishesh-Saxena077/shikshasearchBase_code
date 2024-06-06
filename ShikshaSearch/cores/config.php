<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shiksha";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connection = new mysqli($servername, $username, $password, $dbname);
        date_default_timezone_set('Asia/Kolkata');
    } catch (mysqli_sql_exception $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
?>
