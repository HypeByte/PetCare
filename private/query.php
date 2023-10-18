<?php

require_once 'init.php';

//processes registration form and registers a user in the petcare database
function register_user($user_data): array
{
    global $petcare_db;
    $errors = validate_registration($user_data);
    if($errors['present']) {
        return $errors;
    }
    $hashed_password = password_hash($user_data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password) VALUES (";
    $sql .= "'" . db_escape($petcare_db,$user_data['username']) . "',";
    $sql .= "'" . db_escape($petcare_db,$hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($petcare_db, $sql);
    confirm_result_set($result);
    $user_id = mysqli_insert_id($petcare_db);
    $_SESSION['uid'] = $user_id;
    $_SESSION['username'] = $user_data['username'];
    return $errors;

}

//Checks if a user logs in to a username with the correct password and then sets the session variables for auth purposes
function login_user($user_login): bool
{

    global $petcare_db;

    $sql = "SELECT * FROM users WHERE username='";
    $sql .= db_escape($petcare_db, $user_login['username']) . "'";
    $result = mysqli_query($petcare_db, $sql);
    confirm_result_set($result);
    $fetched_data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if($fetched_data) {
        if(password_verify($user_login['password'], $fetched_data['password'])) {
            $_SESSION['uid'] = $fetched_data['id'];
            $_SESSION['username'] = $fetched_data['username'];
            return true;
        }
    }

    return false;


}