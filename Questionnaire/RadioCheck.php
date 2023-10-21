<?php

namespace Questionnaire;
class RadioCheck extends Question
{
     public $options;

     public function RADIO_DEFAULT() {
         if(!isset($_POST[$this->question_name]) or $_POST[$this->question_name] == '') {
             $this->question_error = Question::Error('Please fill out this field');
             return true;
         } else {
             $this->question_error = Question::Error('');
             return false;
         }
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
        if($this->question_validation == 'RADIO_DEFAULT') {
            $errors = $this->RADIO_DEFAULT();
        }
        return $errors;
    }

    public function displayQuestion($memory = false)
    {   if(!$memory or !isset($_SESSION[$memory[0]][$memory[1]][$memory[2]])) {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            foreach ($this->options as $option) {
                $question_HTML .= "<div class='form-check '>";
                $question_HTML .= "<input class='form-check-input' type='radio' name='" . $this->question_name . "' value='" . $option . "' id='" . $option . "'>";
                $question_HTML .= "<label class='form-check-label' for='" . $option . "'>" . $option . "</label>";
                $question_HTML .= "</div>";
            }
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
        else {
            $question_HTML = "<h5 class='fs-5 mb-2 mt-2'>" . $this->question . "</h5>";
            foreach ($this->options as $option) {
                $question_HTML .= "<div class='form-check'>";
                $question_HTML .= "<input class='form-check-input' type='radio' name='" . $this->question_name . "' value='" . $option . "' id='" . $option . "'" . Question::isChecked($_SESSION[$memory[0]][$memory[1]][$memory[2]], $option) . ">";
                $question_HTML .= "<label class='form-check-label' for='" . $option . "'>" . $option . "</label>";
                $question_HTML .= "</div>";
            }
            $question_HTML .= $this->question_error;
            echo $question_HTML;
        }
    }


}