<html>
<head>
    <title>View Details</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="stock.css">
    <script src="jquery.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
</head>
<body>
<h3 id="add">Detailed View </h3>
<?php
require ('add.php');
if (isset($_GET['id'])){
    $query = 'select * from stock where id='.$_GET['id'];
    if ($result = mysqli_query($conn,$query)){
        $row = mysqli_fetch_array($result);
        ?>

        <div id="view">
        <div class="col-md-3">
            <img src="<?= $row['image']?>" alt="image" id="image1" class="img-rounded">
        </div>
        <div class="col-md-8">
            <div class="table">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['price']?></td>
                    <td><?=$row['quantity']?></td>
                </tr>
            </table>
            </div>
        </div>
        </div>
        <a class="btn btn-primary" id="btn" href="view.php">Back</a>

<?php
    }
}
?>
</body>
</html>