<?php
class DB
{
    public $localhost;
    public $username;
    public $pass;
    public $dbname;
    public  $conn;

   public function __construct($l,$u,$p,$d)
   {
       $this->localhost = $l;
       $this->username = $u;
       $this->pass = $p;
       $this->dbname = $d;
       $this->conn = mysqli_connect($this->localhost,$this->username,$this->pass,$this->dbname);
       if (!$this->conn)
           echo "error: ".mysqli_error($this->conn);
       else
           echo "success";
   }

   public function query($str)
   {
       if ($result = mysqli_query($this->conn,$str))
           return $result;
       else
           echo "error: ".mysqli_error($this->conn);
   }

   public function getResult($res){
       while ($row = mysqli_fetch_array($res))
       {
           echo $row['nam'];
       }
   }
}
?>