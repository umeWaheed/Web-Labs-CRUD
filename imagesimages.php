<?php
include ('imagedb.php');
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="images.css">
</head>
<body>
<?php
$caution="";$size='';
if (isset($_GET['caution'])){
    if ($_GET['caution']=='1'){
        $caution='inserted';
    }
    else{
        $caution='invalid format';
    }
    if ($_GET['size']!='1'){
        $size = 'size exceeds 5000 bytes';
    }
}
?>
<!--insert into db-->
<div class="col-md-12">
    <form action="insertImages.php" enctype="multipart/form-data" method="post" class="out">
        <!--input type="hidden" name="MAX_FILE_SIZE" value="100000000000" /-->
        <input type="file" placeholder="Select image" name="path" class="form-control file"><br>
        <input type="text" placeholder="Description" name="descrip" class="form-control"><br>
        <input type="submit" name="ins" value="insert" class="btn btn-success"><br><br>
        <span class="error"><?= $caution ?></span><br><span class="error"><?= $size?></span>
    </form>
</div>

<?php
$query = "select * from images";
$result = mysqli_query($conn,$query);
while ($row=mysqli_fetch_array($result)){
    ?>
    <div class="panel col-md-3 out">
        <div class="panel-body">
            <img src="<?php echo $row['path'] ?>" alt="image"><br>
        </div>
        <div class="panel-footer">
            <p><?php echo $row['descrip'] ?></p>
        </div>
    </div>
    <?php
}
?>
</body>
</html>
