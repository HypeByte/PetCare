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