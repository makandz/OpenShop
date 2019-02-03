<?php

session_start();

require_once "${path}/vendor/autoload.php";
require_once "${path}/models/config.php";
require_once "${path}/models/sql/Queries.sql.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = $Config['url'];

// Database setup
$Db = $Config['database'];
try {
    $Conn = new PDO(
        "mysql:dbname=".$Db['name'].";host=".$Db['host'],
        $Db['user'],
        $Db['pass'],
        [
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
            PDO::ATTR_STRINGIFY_FETCHES => false,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    echo "<h1>Database Connection Failed</h1><p>Contact support for more information.</p>";
    die();
}

$pass['cart_count'] = count($_SESSION['cart'] ?? []);

?>