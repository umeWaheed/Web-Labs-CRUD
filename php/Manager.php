<?php
class Manager extends Employee
{
    public $emp;

    public function __construct($i,$n,$s)
   {
       parent::__construct($i,$n,$s);
       $this->emp = array();
   }

   public function addEmployee($e){
       array_push($this->emp,$e);
   }
   public function showInfer()
   {
      foreach ($this->emp as $e)
          {
              echo '<br>';
              echo $e->show();
          }
   }
}
?>