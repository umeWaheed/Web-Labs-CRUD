<?php
require('imagedb.php');
$success=true;$size=true;
/*if (isset($_POST['ins'])){
    $valid = array('jpg','png','jpeg','gif');
    $ext = pathinfo($_POST['path']);
    $err = false;
    if (filesize('images/'.$_POST['path']) > 5000){
        $size = false;
    }
    if (!in_array($ext['extension'],$valid)){
        $err = true;
        $success = false;
    }
    //echo filesize($_POST['path']); //inbytes
    print_r(getimagesize('images/'.$_POST['path']));
    $path = $_POST['path'];
    $descrip = $_POST['descrip'];
    if (!$err){
       $query = "insert into images (descrip,path) values ('$descrip','images/$path')";
        if (!mysqli_query($conn,$query)) {
            echo "error";
        }
    }
        header('Location:images.php?caution='.$success.'&size='.$size);
}*/

if (isset($_FILES["path"]) || isset($_POST['ins'])){
    $err=false;$success=true;
    print_r($_FILES,true);
    $tmp_name = $_FILES['path']['tmp_name'];
    $size = $_FILES['path']['size'];
    $type = $_FILES['path']['type'];
    $path = $_FILES['path']['name'];

    $descrip = $_POST['descrip'];
    echo $path.' '.$tmp_name.' '.$type.' '.$size;

    /*if (move_uploaded_file($_FILES['path']['tmp_name'],'images/'.$_FILES['path']['name'])){
        echo "moved";
    }
    else{
        echo "not";
    }*/

    $valid = array('image/jpg','image/png','image/jpeg','image/gif');
    if (!in_array($type,$valid)){
        $err=true;
        $success=false;
    }
    if (!$err) {
        $query = "insert into images (descrip,path) values ('$descrip','images/$path')";
        if (!mysqli_query($conn, $query)) {
            echo "error";
        }
    }
    header('Location:images.php?caution='.$success.'&size='.$size);
}
else{
    echo 'error';
}

?>