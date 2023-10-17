<?php

namespace Questionnaire;

class Calendar extends Question
{

    public function CALENDAR_DEFAULT()
    {
        if(!isset($_POST[$this->question_name]) or $_POST[$this->question_name] == '') {
            $this->question_error = Question::Error('Please fill out this field');
            return true;
        } else {
            $this->question_error = Question::Error('');
            return false;
        }

    }

    public function validateQuestion()
    {
        $errors = false;
        if($this->question_validation == 'CALENDAR_DEFAULT') {
            $errors = $this->CALENDAR_DEFAULT();
        }
        return $errors;
    }

    public function __construct($question, $question_name, $question_validation)
    {
        $this->question = $question;
        $this->question_name = $question_name;
        $this->question_validation = $question_validation;
    }

    public function displayQuestion($memory = false)
    {
        if(!$memory or !isset($_SESSION[$memory[0]][$memory[1]][$memory[2]])) {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            $question_HTML .= "<div class='input-group-md'>";
            $question_HTML .= "<input type='date' class='form-control' name='" . $this->question_name . "' id='" . $this->question_name . "'>";
            $question_HTML .= "</div>";
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
        else {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            $question_HTML .= "<div class='input-group-md'>";
            $question_HTML .= "<input type='date' class='form-control' name='" . $this->question_name . "' id='" . $this->question_name . "' value='" . $_SESSION[$memory[0]][$memory[1]][$memory[2]] . "'>";
            $question_HTML .= "</div>";
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
    }
}