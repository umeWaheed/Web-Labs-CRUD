<html>
<head>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<body>
<?php
$arr = array('sre','stats','web');
setcookie("username","ume");
if (isset($_COOKIE["username"]))
{
    echo "Welcome back! ".$_COOKIE['username'];
}
if (isset($_COOKIE['item'])){
    array_push($arr,$_COOKIE['item']);
}
if (isset($_GET['submit']))
{
    array_push($arr,$_GET['name']);
    setcookie('item',$_GET['name']);
}
if (isset($_GET['remove']))
{
    if (in_array($_GET['name'],$arr)) {
        $key = array_search($_GET['name'], $arr);
        unset($arr[$key]);
    }
}
?>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <form action="todolist.php" method="get">
        <h3>Add a new list item</h3>
        <input type="text" placeholder="name" class="form-control" name="name">
        <br>
        <input type="submit" class="btn btn-default" value="select all" name="select">
        <input type="submit" class="btn btn-default" value="deselect all" name="deselect">
        <input type="submit" class="btn btn-danger" value="remove" name="remove">
        <input type="submit" class="btn btn-primary" value="Add" name="submit">
    </form>
    <ul class="list-group">
        <li class="list-group-item list-group-item-heading list-group-item-info">ToDo list</li>
        <?php
        foreach ($arr as $item) {
            if (isset($_GET['select'])) {
                ?>
                <li class="list-group-item"><input type="checkbox" name="item" value="<?php echo $item ?>" checked> <?php echo $item ?></li>
                <?php
            }
            else if (isset($_GET['deselect']) or !isset($_GET['select'])){
                ?>
                <li class="list-group-item"><input type="checkbox" name="item" value=" <?php echo $item ?>">
                    <?php echo $item ?></li>
        <?php
            }
        }
        ?>
    </ul>

</div>
</body>
</html>