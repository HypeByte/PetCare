<?php


//Database credential file which includes PHP constants for username (DB_USER), password (DB_PASSWORD), and database name (DB_NAME)
require_once('db_credentials.php');

//Creates a connection to the database using the constants defined in db_credentials.php
function db_connect()
{
    $conn = mysqli_init();
    mysqli_ssl_set($conn, NULL, NULL, private_path . '\cert\DigiCertGlobalRootCA.crt.pem' , NULL, NULL);
    $connection = mysqli_real_connect($conn, DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
    confirm_db_connect();
    return $conn;
}


//Disconnects from the database
function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

//Prevents SQL injection by escaping special characters in a string for use in an SQL statement
function db_escape($connection, $string)
{
    return mysqli_real_escape_string($connection, $string);
}

//Confirms that the connection to the database was successful
function confirm_db_connect()
{
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

//Confirms that the query was successful
function confirm_result_set($result_set)
{
    if (!$result_set) {
        exit("Database query failed.");
    }
}