<?php

//spits out the style attribute for the input part of a boostrap form group for when form data does not pass validation
function error_style_input($errors, $field): void
{
    if($errors[$field] != '') {
        echo 'style="border-top: 4px solid red; border-bottom: 4px solid red; border-right: 4px solid red;"';
    }
}

//spits out the style attribute for the logo part of a boostrap form group for when form data does not pass validation
function error_style_logo($errors, $field): void
{
    if($errors[$field] != '') {
        echo 'style="border-top: 4px solid red; border-bottom: 4px solid red; border-left: 4px solid red;"';
    }
}


//Used for the ShareKey Feature, generates random share_key for the appointment results used in the url
function randomString($n): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}