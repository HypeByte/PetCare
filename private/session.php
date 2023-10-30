<?php

//Initiates the session storage
function start_session($uid, $username) {
    $_SESSION['uid'] = $uid;
    $_SESSION['username'] = $username;
}

//Ends an appointment and clears session storage
function end_appointment() {
    if(isset($_SESSION['uid'])) {
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
    }
}

//Checks session storage to see if the user has logged in and redirects if it does not detect a login
function require_login() {
    if(!isset($_SESSION['uid'])) {
        redirect_to('register.php');
    }
}