<?php

namespace Questionnaire;
class Form
{
    public $form_name;
    public $questions;
    public $nodes;
    public function __construct($form_name, $questions, $nodes = null) {
        $this->form_name = $form_name;
        $this->questions = $questions;
        $this->nodes = $nodes;
    }

    public function display($questionnaire = false) {
        if(!$questionnaire) {
            foreach($this->questions as $question) {
                echo $question->displayQuestion();
            }
        } else {
            foreach($this->questions as $question) {
                echo $question->displayQuestion([$questionnaire, $this->form_name, $question->question_name]);
            }
        }

    }

    public function validate() {
        $error = false;
        foreach($this->questions as $question) {
            if($question->validateQuestion()) {
                $error = true;
            }
        }
        return $error;
    }


}
