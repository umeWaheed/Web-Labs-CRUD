<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $idErr = $phoneErr = "";
$name = $email = $id = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["id"])) {
        $id = "";
    } else {
        $id = test_input($_POST["id"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if ($id < 0) {
            $websiteErr = "Invalid id";
        }
    }

    if (empty($_POST["phone"])) {
        $phone = "";
    } else {
        $phone = test_input($_POST["phone"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Create New Data</h2>
<p><span class="error1">* required field.</span></p>
<form method="post" action="update.php">
    ID: <input type="text" name="id" value="<?php echo $id;?>">
    <span class="error1">* <?php echo $idErr;?></span>
    <br><br>
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error1">* <?php echo $nameErr;?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error1">*<?php echo $emailErr;?></span>
    <br><br>
    Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
    <span class="error1">*<?php echo $phoneErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST["submit"])) {
    //$sql = "insert into customers(id, name, email, phone-no.) VALUES (".$id.",'".$name."','".$email."','".$phone."')";
    //require 'db.php';
    //$pdo = Database::connect();


    //$sql = 'insert into customers(id,name,email,phone-no.) values ($id,$name,$email,$phone)';
    //if($pdo->query($sql) === TRUE)
    //{
    //  echo "Succesfully";
    //}

    //Database::disconnect();
    $id=$_POST["id"];
    $id1=$_POST["name"];
    $id2=$_POST["email"];
    $id3=$_POST["phone"];

    $sql = "UPDATE customers SET id='$id', name='$id1',email='$id2',mobile='$id3' WHERE id=".$_POST["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (mysqli_query($conn,$sql)) {
        echo "New record updated successfully";
    } else {
        echo "this Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>