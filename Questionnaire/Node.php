<?php

namespace Questionnaire;

class Node
{
    public $next_form;
    public $response;

    public function __construct($next_form, $response = false) {
        $this->next_form = $next_form;
        $this->response = $response;
    }

}