<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="web";

//create connection
$conn = mysqli_connect($servername,$username,$password)
or die('error');

//check conn
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "";

//select db
$select = mysqli_select_db($conn,$database_name)
or die ('');
if($select)
    echo ("");

?>
    <!--deletion-->
<?php
if(isset($_GET["del"]))
{
    $delete_id = $_GET['id'];
    $query = "delete from books where id='$delete_id'";
    $succ = mysqli_query($conn,$query);
    if (!$succ)
        echo ('error '.mysqli_error($conn));
    else
        echo ('done');
}
?>