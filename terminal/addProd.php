<html>
<head>
    <title>Add Products</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="stock.css">
    <script src="jquery.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
</head>
<body>
<?php
require('add.php');

$nErr = $pErr = $iErr = $qErr = "";
$err = false;

if (isset($_POST['sub'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quan = $_POST['quantity'];

    if (isset ($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];

        $valid = array('image/png','image/jpg','image/jpeg','image/gif');
        if (!in_array($image_type,$valid)){
            $err=true;
            $iErr = 'Choose a valid format';
        }

        if ($image_size>1000000){
            $err = true;
            $iErr = 'size exceeds 1MB';
        }
    }
    else{
        $err=true;
        $iErr='select an image';
    }

    if (!preg_match("/^[a-zA-Z ]*$/",$name) || empty($name)){
        $err = true;
        $nErr = "Enter a valid name";
    }
    if (empty($price) || !preg_match("/^[0-9]*$/",$price)){
        $err = true;
        $pErr = "Enter a valid price";
    }

    if (!preg_match("/^[0-9]*$/",$quan)){
        $err = true;
        $qErr = "Enter a valid quantity";
    }

    if (!$err){
     $query = "insert into stock (name,price,quantity,image) values ('$name','$price','$quan','images/$image')";
        if (mysqli_query($conn,$query)){
            echo 'inserted';
            header ('Location:view.php');
        }
        else{
            echo mysqli_error($conn);
        }
    }
}
?>
<h3 id="add">Add Product</h3>
<div class="col-md-2"></div>
<div id="form" class="col-md-8">
    <form action="addProd.php" method="post" enctype="multipart/form-data" onsubmit=" return validate();" name="f1">
        <label for="n">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="n"><span id="name" class="error"><?= $nErr ?></span><br>
        <label for="p">Price</label>
        <input type="text" name="price" placeholder="price" class="form-control" id="p"><span id="price" class="error"><?= $pErr ?></span><br>
        <label for="q">Quantity</label>
        <input type="text" name="quantity" placeholder="quantity" class="form-control" id="q"><span id="quantity" class="error"><?= $qErr ?></span><br>
        <label for="file">Image</label>
        <input type="file" name="image" placeholder="upload an image" class="form-control" id="file"><span id="image" class="error"><?= $iErr ?></span><br>
        <input type="submit" name="sub" class="btn btn-success">
        <a href="view.php" class="btn btn-default">View Products</a>
    </form>
</div>
<script>
    function validate(){
        var name = document.forms['f1']['name'].value;
        var price = document.forms['f1']['price'].value;
        var quan = document.forms['f1']['quantity'].value;
        var image = document.forms['f1']['image'].value;

        document.getElementById('name').innerHTML = "";
        document.getElementById('price').innerHTML = "";
        document.getElementById('quantity').innerHTML = "";
        document.getElementById('image').innerHTML = "";

         if (name==""){
            // alert ('enter a name');
             document.getElementById('name').innerHTML = "Enter a name";
             return false;
         }
        if (price==""){
            // alert ('enter a name');
            document.getElementById('price').innerHTML = "Enter a price";
            return false;
        }
        if (quan==""){
            // alert ('enter a name');
            document.getElementById('quantity').innerHTML = "Enter a quantity";
            return false;
        }
        if (image==""){
            // alert ('enter a name');
            document.getElementById('image').innerHTML = "Select an image";
            return false;
        }
    }
</script>
</body>
</html>