<?php
//easy and efficient initialization file for files to get their dependencies fast and easily

session_start();
ob_start();


const private_path = __DIR__ . '/';

require_once private_path . 'database/db_credentials.php';
require_once private_path . 'database/database.php';
require_once private_path . 'server.php';
require_once private_path . 'validate.php';
require_once private_path . 'query.php';
require_once private_path . 'util.php';
require_once private_path . 'session.php';

$petcare_db = db_connect();

