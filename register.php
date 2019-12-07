<?php
require ('db.php');
$ferr = $lerr = $err = $uerr = $perr = $cerr = $success = "";
$valid = true;
if (isset($_GET['sub']))
{
    $first = $_GET['first'];
    $last = $_GET['last'];
    $user = $_GET['user'];
    $email = $_GET['email'];
    $pass = $_GET['pass'];
    $conf = $_GET['confirm'];
    $gender = $_GET['gender'];
    $acc = $_GET['account'];

    if (empty($first) || !preg_match("/^[a-zA-Z]*$/",$first)){
        $ferr = "invalid first name";
        $valid=false;
    }
    if (empty($last) || !preg_match("/^[a-zA-Z]*$/",$last)){
        $lerr = "invalid last name";
        $valid=false;
    }
    if (empty($user) || !preg_match("/^[a-zA-Z0-9]*$/",$user)){
        $uerr = "invalid user name";
        $valid=false;
    }
    if (empty($email) || !preg_match("/^[a-zA-Z0-9\.\_\-]*@[a-zA-Z\.]*[a-zA-Z]*$/",$email)){
        $err = "invalid email id";
        $valid=false;
    }
    if (empty($pass) || !preg_match("/^[a-zA-Z0-9\.\_\-]*$/",$pass)){
        $perr = "enter a password";
        $valid=false;
    }
    if (empty($conf)){
        $cerr = "confirm password";
        $valid=false;
    }
    if (!empty($pass) and !empty($conf)){
        if (strcmp($pass,$conf)<>0){
            $valid = false;
            $cerr = "password does not match";
        }
    }

    if ($valid){
        $query = "insert into register values ('$first','$last','$user','$email','$pass','$gender','$acc')";
        if (mysqli_query($conn,$query)){
            $success = "Registered Successfully";
        }
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="reg.css">
</head>
<body>
<div class="container">
    <h2>Registration Form</h2>
    <hr>
    <br>

<form action="register.php" method="get">
    <div class="col-md-3">
        <label for="#">Full Name</label> *
    </div>
        <div class="col-md-9">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="first name" name="first"><span class="red"><?php echo $ferr ?></span>
            </div>
            <div class="col-md-6">
                 <input type="text" class="form-control" placeholder="last name" name="last"><span class="red"><?php echo $lerr ?></span>
                <br>
            </div>
        </div>

    <div class="col-md-3">
        <label for="user">User Name</label> * <span class="red"><?php echo $uerr ?></span>
    </div>
    <div class="col-md-9">
        <input type="text" name="user" class="form-control" id="user">
        <br>
    </div>

    <div class="col-md-3">
        <label for="#">Email Address</label> * <span class="red"><?php echo $err ?></span>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" name="email">
        <br>
    </div>

    <div class="col-md-3">
        <label for="#">Password</label> * <span class="red"><?php echo $perr ?></span>
    </div>
    <div class="col-md-9">
        <input type="password" class="form-control" name="pass">
        <br>
    </div>

    <div class="col-md-3">
        <label for="#">Retype password</label> * <span class="red"><?php echo $cerr ?></span>
    </div>
    <div class="col-md-9">
        <input type="password" class="form-control" name="confirm">
        <br>
    </div>

    <div class="col-md-3">
        <label for="#">Gender</label> *
    </div>
    <div class="col-md-9">
        <input type="radio"  name="gender" value="M" checked> Male <br>
        <input type="radio"  name="gender" value="F"> Female
        <br>
        <br>
    </div>

    <div class="col-md-3">
        <label for="#">Create Account as</label> *
    </div>
    <div class="col-md-9">
        <input type="radio"  name="account" value="I" checked> Course Instructor <br>
        <input type="radio"  name="account" value="S"> Student
        <br>
    </div>

    <input type="submit" name="sub" value="submit" class="btn btn-success">
    <br>

    <h5><?php echo $success ?></h5>
</form>
</div>
</body>
</html>
