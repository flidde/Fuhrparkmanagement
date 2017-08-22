<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22.08.2017
 * Time: 19:49
 */

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=fuhrparkdb;host=frillingsql01.database.windows.net';
$user = 'afrilling';
$password = 'unigoe12!';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>