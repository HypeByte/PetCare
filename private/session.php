<?php

function start_appointment($uid, $username, $db) {
    $_SESSION['uid'] = $uid;
    $_SESSION['username'] = $username;

    $sql = "INSERT INTO appointments (uid) VALUES (" . "'" . $uid . "'" . ")";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $appointment_id = mysqli_insert_id($db);
    $_SESSION['appointment_id'] = $appointment_id;
}

function end_appointment() {
    if(isset($_SESSION['uid'])) {
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        unset($_SESSION['appointment_id']);
    }
}

function require_login() {
    if(!isset($_SESSION['uid'])) {
        redirect_to('login.php');
    }
}