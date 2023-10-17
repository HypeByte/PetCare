<?php

namespace Questionnaire;

abstract class Question
{
    public $question;
    public $question_name;
    public $question_validation;
    public $question_error = '';

    public static function Error($message) {
        return '<div class="p text-danger">' . $message . '</div>';
    }

    public static function isChecked($response, $option_value) {
        if(isset($response)) {
            if($response == $option_value) {
                return 'checked';
            }
        }
        return '';
    }

    public static function isSelected($response, $option_value) {
        if(isset($response)) {
            if($response == $option_value) {
                return 'selected';
            }
        }
        return '';
    }


    abstract public function validateQuestion();
    abstract public function displayQuestion($memory = false);

}
