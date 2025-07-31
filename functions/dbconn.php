<?php
// Enable strict error reporting for MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Local database (footfall)
$local_server = "localhost";
$remote_server = "172.16.32.9"; // IP of the Koha server
$username = "footfall";
$password = "Ranganathan@pku#2022";
$db = "footfall";
$koha_db = "koha_library";

// Set timezone
date_default_timezone_set("Asia/Kolkata");

try {
    // Connect to local footfall DB
    $conn = new mysqli($local_server, $username, $password, $db);
    $conn->set_charset("utf8mb4");

    // Connect to remote Koha DB
    $koha = new mysqli($remote_server, $username, $password, $koha_db);
    $koha->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Sanitization helper
function sanitize(mysqli $conn, string|null $str): string {
    return $str !== null ? $conn->real_escape_string($str) : '';
}
