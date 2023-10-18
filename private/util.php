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