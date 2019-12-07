<?php
/*include('Employee.php');
include ('Manager.php');
include('Secretary.php');
include('DB.php');

$conn = new DB('localhost','root','','db1');
$res = $conn->query('select * from bus');
$conn->getResult($res);

$emp = array();
$emp[0] = new Employee(1,"emp1",1234);
$emp[1] = new Employee (2,"emp2",123);
$emp[2] = new Employee(3,'emp3',12);
$emp[3] = new Employee(4,'emp4',34);
$emp[4] = new Employee(5,'emp5',56);

$emp[5] = new Manager(6,'man',2345);
$emp[6] = new Secretary (7,'sec',23,$emp[5]);
$emp[5]->addEmployee($emp[0]);
$emp[5]->addEmployee($emp[2]);
$emp[5]->showInfer();
$emp[6]->showSuper();

print_r($emp);

$a = 0;
$b = 1;
echo "Fibonnaci: ";
echo $a." ".$b;
for ($i=0 ; $i<18 ; $i++){
    $c = $a+$b;
    $a = $b;
    $b = $c;
    echo " ".$c;
}
$day = date('r');
$day = substr($day,0,3);
echo "<br>".$day;

$str = file_get_contents('http://www.google.com.pk');
echo $str;*/
?>
<html>
<head>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<body>
<form action="test.php" method="get" class="col-md-5">
*First Name: <input type="text" name="first" required class="form-control">
*last name: <input type="text" name="last" required class="form-control">
*address 1: <textarea name="add1" id="1" cols="30" rows="1" required class="form-control"></textarea>
address 2: <textarea name="add2" id="2" cols="30" rows="1" class="form-control"></textarea>
*city: <input type="text" name="city" required class="form-control">
state (us only): <input type="text" name="state" class="form-control">
postal code: <input type="text" name="postal" class="form-control">
province: <input type="text" name="prov" class="form-control">
*country: <select name="country" required class="form-control">
        <option value="0">select country</option>
        <option value="c1">c1</option>
        <option value="c2">c2</option>
        <option value="c3">c3</option>
    </select>
<input type="reset" class="btn btn-default">
    <input type="submit" class="btn btn-success" name="sub">
</form>
</body>
</html>
<?php
if (isset($_GET['sub']))
{
    if ($_GET['first']<>'Eric')
        echo 'Strangers Forbidden';
    else{
        echo "<br>".$_GET['first'];
        echo "<br>".$_GET['last'];
        echo "<br>".$_GET['add1'];
        echo "<br>".$_GET['city'];
        echo "<br>".$_GET['country'];
    }
    if ($_GET['country']==0)
        echo 'please select a country';
}
?>