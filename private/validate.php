<?php

//checks if a $username exists in the users table of the database
function user_exists($username) {
    global $petcare_db;
    $sql = "SELECT * FROM users WHERE username='";
    $sql.= $username . "'";
    $result = mysqli_query($petcare_db, $sql);
    confirm_result_set($result);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return !($user_count === 0);

}

//processes registration form data and returns an array of errors
function validate_registration($user_data) {
    $errors = [
        'username' => '',
        'password' => '',
        'confirm_password' => '',
        'present' => false
    ];


    if(user_exists($user_data['username'])) {
        $errors['username'] = 'Username already exists, choose another username.';
        $errors['present'] = true;
    } elseif(!preg_match('/^[a-zA-Z0-9]{3,}$/', $user_data['username'])) {
        $errors['username'] = 'Username must be at least 3 characters long and can only contain letters and numbers.';
        $errors['present'] = true;
    }


    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $user_data['password'])) {
        $errors['password'] = 'Password must be at least 8 characters, must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number, can contain special characters';
        $errors['present'] = true;
    } elseif ($user_data['password'] !== $user_data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
        $errors['present'] = true;
    }

    return $errors;

}

