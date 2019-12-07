<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="crud.css">
</head>
<body>
<?php
include ('db.php');
$id = $name = $email = $mob = $success = $gender = "";
$idErr = $nameErr = $emErr = $mobErr = $genErr = "";
?>
<?php
 if (isset($_GET['delete']))
 {
     $query = "delete from customers where id=".$_GET['prevId'];
     if (mysqli_query($conn,$query))
         $success =  "deleted successfully";
     else
         echo "Error: ".mysqli_error($conn);
 }
?>
<?php
if (isset($_GET['update'])) {
    $query = "select * from customers where id=".$_GET['prevId'];
    if ($result = mysqli_query($conn, $query)) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mob = $row['mobile'];
        $gender = $row['gender'];
    } else
        echo "error";
}
?>
<?php
    if (isset($_GET['sub'])){
    $idPatt = "/^[0-9]{1,2}$/";
    $namePatt="/^[a-zA-z ]*$/";
    $emailPatt="/^[a-zA-z0-9\.\_\-]*@[a-zA-z\.]*[a-zA-z]$/";

        $id = $_GET["id"];
        $name = $_GET["name"];
        $email = $_GET["email"];
        $mob = $_GET["mobile"];
        $gender = $_GET["gender"];
        $valid = 1;

    if (!preg_match($idPatt,$id) or empty($id)){
        $valid = 0;
        $idErr =  "Id Error: only digits are allowed with max 2 digits <br>";
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
        if (!isset($_GET['gender'])){
            $valid = 0;
            $genErr = "select a gender";
        }

    if ($valid) {
        $query = "update customers set id='$id',name='$name',email='$email',mobile='$mob',gender='$gender' where id=".$_GET['prevId'];
        if (mysqli_query($conn, $query))
            $success = "successfully updated";
        else
            echo "error: ".mysqli_error($conn);
    }
}
?>
<?php
if (!isset($_GET['delete'])) {
    ?>
    <h1>Update an existing Record</h1>
    <form action="update.php" method="get" class="form f1" onsubmit="return validate();" name="myform">
        <input type="text" value="<?php echo $id ?>" name="id" class="form-control">*<span id="iderr"><?php echo $idErr ?></span>
        <br>
        <input type="text" value="<?php echo $name ?>" name="name"
               class="form-control">*<span id="nameerr"><?php echo $nameErr ?></span>
        <br>
        <input type="text" value="<?php echo $email ?>" name="email"
               class="form-control">*<span id="emailerr"><?php echo $emErr ?></span>
        <br>
        <input type="text" value="<?php echo $mob ?>" name="mobile"
               class="form-control">*<span id="moberr"><?php echo $mobErr ?></span>
        <br>
        <?php
         if ($gender == 'M') {
             ?>
             <input type="radio" name="gender" value="M" checked>Male
             <input type="radio" name="gender" value="F">Female
             <?php
         }
        else{
            ?>
            <input type="radio" name="gender" value="M">Male
             <input type="radio" name="gender" value="F" checked>Female
            <?php
        }
        ?>
        <br>
        <span><?php echo $genErr ?></span>
        <br>
        <input type="hidden" name="prevId" value="<?php echo $_GET['prevId'] ?>">
        <a href="read.php" class="btn btn-primary">Back</a>
        <input type="submit" class="btn btn-success" name="sub" value="Update">
    </form>
    <?php
}
else{
    ?>
    <a href="read.php" class="btn btn-primary">Go Back</a>
<?php
}
echo $success;
?>
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