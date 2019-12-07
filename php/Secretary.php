<?php

class Secretary extends Employee
{
   public $manager;

    public function __construct($i,$n,$s,$m)
    {
        parent::__construct($i,$n,$s);
        $this->manager = $m;
    }

    public function showSuper(){
        echo '<br>';
        echo $this->manager->show();
    }
}
?>