<?php
class problems {
    private $ID;
    private $skin_type;
    private $problem;
  
    function __construct($ID, $skin_type, $problem) {
      $this->ID = $ID;
      $this->skin_type = $skin_type;
      $this->problem = $problem;
    }

    //GETTERS
    function getID() {
        return $this->ID;
      }
    
      function getSkinType() {
        return $this->skin_type;
      }
    
      function getProblem() {
        return $this->problem;
      }

      //SETTERS
      function setID($ID) {
        $this->ID = $ID;
      }
    
      function setSkinType($skin_type) {
        $this->skin_type = $skin_type;
      }
    
      function setProblem($problem) {
        $this->problem = $problem;
      }
    }
?>