<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="crud.css">
</head>
<body>
<?php
 include ('db.php');
$id = $name = $email = $mob = $gender = $success = "";
$idErr = $nameErr = $emErr = $mobErr = $genErr = "";
?>
<?php
if (isset($_GET['sub']))
{
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $mob = $_GET['mobile'];
    $gender = $_GET['gender'];

    $idPatt = "/^[0-9]{1,2}$/";
    $namePatt="/^[a-zA-Z ]*$/";
    $emailPatt="/^[a-zA-Z0-9\.\_\-]*@[a-zA-Z\.]*[a-zA-Z]*$/";

    $valid = 1;
    if (!preg_match($idPatt,$id) or empty($id)){
        $valid = 0;
        $idErr =  "Id error: only digits are allowed with max 2 digits <br>";
    }
    if (!preg_match($namePatt,$name) or empty($name)) {
        $valid = 0;
        $nameErr = "Name error: only letters and whitespaces allowed <br>";
    }
    if (!preg_match($emailPatt,$email) or empty($email)) {
        $valid = 0;
        $emErr = "Email error: invalid email format <br>";
    }
    if (empty($mob) or !preg_match("/^[0-9]{5}$/",$mob)){
        $valid = 0;
        $mobErr = "number is not 5 digits long";
    }
    if (empty($gender)){
        $valid = 0;
        $genErr = "select a gender";
    }
    if ($valid) {
        $query = "insert into customers values ('$id','$name','$email','$mob','$gender')";
		echo $query;
        if (mysqli_query($conn, $query))
            $success = "successfully inserted";
        else
            echo "error".mysqli_error($conn);
    }
}
?>

<h1>Add a new Record</h1>
<form action="add.php" method="get" class="form f1" name="myform" onsubmit="return validate();">
    <label for="id">Id:</label>
    <input type="text" id="id" name="id" class="form-control">*<span id="iderr"><?php echo $idErr ?></span>
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" class="form-control">*<span id="nameerr"><?php echo $nameErr ?></span>
    <br>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" class="form-control">*<span id="emailerr"><?php echo $emErr ?></span>
    <br>
    <label for="mob">Mobile number:</label>
    <input type="text" id="mob" name="mobile" class="form-control">*<span id="moberr"><?php echo $mobErr ?></span>
    <br>
    <label for="gender">Gender:</label>
    <input type="radio" name="gender" value="M" checked>Male
    <input type="radio" name="gender" value="F">Female
    <br><span>*<?php echo $genErr?></span>
    <br>
    <a href="read.php" class="btn btn-primary">Back</a>
    <input type="submit" class="btn btn-success" name="sub" value="Add">
</form>
<?php echo $success ?>
<script>
    function validate(){
        var id = document.forms["myform"]["id"].value;
        var name = document.forms["myform"]["name"].value;
        var email = document.forms["myform"]["email"].value;
        var mob = document.forms["myform"]["mobile"].value;

        document.getElementById("iderr").style.color = "red";
        document.getElementById("nameerr").style.color = "red";
        document.getElementById("emailerr").style.color = "red";
        document.getElementById("moberr").style.color = "red";

        if (id==""){
            document.getElementById("iderr").innerHTML="enter a id";
            return false;
        }
        else{
            document.getElementById("iderr").innerHTML="";
        }
        if (name==""){
            document.getElementById("nameerr").innerHTML="enter a name";
            return false;
        }
        else{
            document.getElementById("nameerr").innerHTML="";
        }
        if (email==""){
            document.getElementById("emailerr").innerHTML="enter an email id";
            return false;
        }
        else{
            document.getElementById("emailerr").innerHTML="";
        }
        if (mob==""){
            document.getElementById("moberr").innerHTML="enter a mobile number";
            return false;
        }
        return true;
    }
</script>
</body>
</html>