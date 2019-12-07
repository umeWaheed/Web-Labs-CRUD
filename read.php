<?php
    include ('db.php');
?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="crud.css">
</head>
<body>
<h1>Read Records</h1>
 <div class="table-responsive">
     <table class="table table-bordered table-hover">
         <tr>
             <th>id</th>
             <th>name</th>
             <th>email</th>
             <th>mobile</th>
             <th>gender</th>
             <th></th>
         </tr>
         <?php
          $query = "select * from customers order by id";
          $result = mysqli_query($conn,$query);
          if (!$result)
              echo "error";
         $row = mysqli_fetch_array($result);
         while($row) {
             ?>
              <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['mobile'] ?></td>
                  <td><?php echo $row['gender'] ?></td>
                    <td>
                  <form action="update.php" method="get">
                      <input type="hidden" name="prevId" value="<?php echo $row['id']?>">
                      <input type="submit" name="update" value="Update" class="btn btn-primary"> <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                  </form>
                  </td>
                  </tr>
             <?php
             $row = mysqli_fetch_array($result);
         }
         ?>

     </table>
 </div>
 <form action="add.php" method="get" id="in">
     <input type="submit" value="create new" class="btn btn-success">
 </form>
</body>
</html>