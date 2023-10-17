<?php

namespace Questionnaire;

class DxTx
{

    public $DXTX_INDICATOR = true;
    public $diagnosis;
    public $treatment;

   public function __construct($diagnosis, $treatment) {
       $this->diagnosis = $diagnosis;
       $this->treatment = $treatment;
   }

   public static function isDxTx($value) {
       if( isset($value->DXTX_INDICATOR) ) {
           return true;
       }
       return false;
   }


}