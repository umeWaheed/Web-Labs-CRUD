<html>
<head>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="stock.css">
    <script src="jquery.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script>
        $(document).ready(
            function (){
                $("#text").hide();
                $("#test").click(
                    function(){
                        $("#test").hide();
                        $("#text").show();
                    });
                $("#text").click(
                    function(){
                        $("#test").show();
                        $("#text").hide();
                    });
                //$("#empty").fadeIn("fast");
                $("#add").slideDown();
                $("#empty").fadeOut(3500);
            });
    </script>
</head>
<body>
<h3 id="empty">Welcome</h3>
<h3 id="add">Add a new product &nbsp;&nbsp;<a href="addProd.php" class="btn btn-success">Add</a></h3>
<hr>

<?php
require('add.php');
$query = 'select * from stock where quantity>0';
if (!mysqli_query($conn,$query)){
    echo 'error';
}
else{
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)){
        ?>

        <div class="col-md-3 panel">
            <div class="panel-body">
                <img src="<?= $row['image'] ?>" alt="image">
                <h3><?= $row['name']?></h3>
            </div>
            <div class="panel-footer">
                <a href="viewDetails.php?id=<?= $row['id']?>">view details</a>
            </div>
        </div>
<?php
    }
}
?>
<buttton id="test" class="btn btn-danger">testing</buttton>
<button id="text" class="btn btn-success">Gone!</button>
</body>
</html>
