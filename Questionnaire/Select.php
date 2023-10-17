<?php

namespace Questionnaire;

class Select extends Question
{
    public $options;
    public function SELECT_DEFAULT()
    {
        $this->question_error = Question::Error('');
        return false;
    }


    public function __construct($question, $question_name, $options, $question_validation)
    {
        $this->question = $question;
        $this->question_name = $question_name;
        $this->options = explode(',', $options);
        $this->question_validation = $question_validation;
    }

    public function validateQuestion()
    {
        $errors = false;
        if($this->question_validation == 'SELECT_DEFAULT') {
            $errors = $this->SELECT_DEFAULT();
        }
        return $errors;
    }

    public function displayQuestion($memory = false)
    {
        if(!$memory or !isset($_SESSION[$memory[0]][$memory[1]][$memory[2]])) {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            $question_HTML .= "<div class='input-group-md'>";
            $question_HTML .= "<select class='form-select' name='" . $this->question_name . "' id='" . $this->question_name . "'>";
            foreach ($this->options as $option) {
                $question_HTML .= "<option value='" . $option . "'>" . $option . "</option>";
            }
            $question_HTML .= "</select>";
            $question_HTML .= "</div>";
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
        else {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            $question_HTML .= "<div class='input-group-md'>";
            $question_HTML .= "<select class='form-select' name='" . $this->question_name . "' id='" . $this->question_name . "'>";
            foreach ($this->options as $option) {
                $question_HTML .= "<option value='" . $option . "'" . Question::isSelected($_SESSION[$memory[0]][$memory[1]][$memory[2]], $option) . ">" . $option . "</option>";
            }
            $question_HTML .= "</select>";
            $question_HTML .= "</div>";
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
    }

}