<?php

function start_session($uid, $username) {
    $_SESSION['uid'] = $uid;
    $_SESSION['username'] = $username;
}

function end_appointment() {
    if(isset($_SESSION['uid'])) {
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
    }
}

function require_login() {
    if(!isset($_SESSION['uid'])) {
        redirect_to('login.php');
    }
}