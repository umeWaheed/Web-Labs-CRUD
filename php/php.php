<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP into</title>
    <style>
        table,th,td,tr{
            border: 0.1em solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>php intoduction</h1>
<p>
    php is server side language.<br>
    a web browser cannot understand php and thus an html file with php code does not show the php part of file<br>
    php works with a server (which acts as an interpreter for php) a server executes php code line by line <br>
    and embedes the result into html. the browser request a page. the request is send to server which executes php <br>
    and returns the html to browser. the 'view source will show only html of page after conversion'<br>
    php is slower than other server side lang because it does not create a .class or compiled file once executes<br>
    rather it is executed separately for each request of same page. the solution to the problem is to cache the page <br>
    that is being widely requested.
</p>

<h2>Connect to mysql database</h2>
<ol>
    <li>import the .sql file of db to wamp localhost/phpmyadmin</li>
    <li>open a new connection by providing localhost,root and password as space</li>
    <li>select the db</li>
    <li>select query</li>
    <li>execute query and store result in a var</li>
    <li>traverse the var and print</li>



</ol>
<?php
 echo "i won't print if this is a .html file";
$str ="i am a string";
$str = array(1,2,3);
$len = count($str);
echo "$len";
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="sakila";

//create connection
$conn = mysqli_connect($servername,$username,$password)
or die('error');

//check conn
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo ",Connected successfully";

//select db
$select = mysqli_select_db($conn,$database_name)
or die ('db not available');
if($select)
    echo (",db selected");

$query = "select first_name from actor";
mysqli_query($conn,$query) or die (',error querying');
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>

<table>
    <tr>
        <th>serial number</th>
        <th>first name</th>
    </tr>
    <?php
    for ($i=0 ; $i<10 ;$i++)
    {
    ?>
    <tr>
        <td>
            <?php
            echo $i;
            ?>
        </td>
        <td>
            <?php
            echo $row['first_name'];
            $row = mysqli_fetch_array($result);
             ?>
        </td>
    </tr>
        <?php
    }
    ?>
</table>

    </body>
</html>