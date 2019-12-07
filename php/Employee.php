<?php
class Employee
{
    public $id;
    public $name;
    public $salary;

    public function __construct($i,$name,$salary){
         $this->name = $name;
         $this->salary = $salary;
         $this->id = $i;
    }
    public function show(){
        return "id: ".$this->id."Name: ".$this->name." Salary: ".$this->salary;
    }
}
?>


