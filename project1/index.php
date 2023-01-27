<?php
    include("connect.php");

    if (isset($_POST['btn']))
    {
      $date=$_POST['idate'];
      $q="select * from iris where date='$date'";
      $query=mysqli_query($con,$q);
    } 
	else 
	{
      $q= "select * from iris";
      $query=mysqli_query($con,$q);
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <!-- top -->
            <div class="row">
                <div class="col-lg-8">
                    <h1>View Iris List</h1>
                    <a href="add.php">Add Iris</a>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Date Filtering-->
                            <form method="post" action="">
                              <input type="date" class="form-control" name="idate">
                        </div>
                          <div class="col-lg-4" method="post">
                            <input type="submit" class="btn btn-danger float-right" name="btn" value="filter">
                        </div>
                            </form>
                    </div>
                </div>
            </div>
           
            <!--Cards -->
            <div class="row mt-4">
                
             <?php
                  while ($qq=mysqli_fetch_array($query)) 
                  {
                  
             ?>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                          <h6 class="card-title"><?php echo $qq['sepal_length'], " cm sepal length"  ?></h6>
                          <h6 class="card-title "><?php echo $qq['sepal_width'], " cm sepal width"; ?></h6>
                          <h6 class="card-title "><?php echo $qq['petal_length'], " cm petal length"; ?></h6>
                          <h6 class="card-title "><?php echo $qq['petal_width'], " cm petal width"; ?></h6>
                          <?php
                          if($qq['class'] == 0) {
                          ?>
                            <p class="text-info">Iris-setosa</p>
                          <?php
                          } else if($qq['class'] == 1) {
                          ?>
                            <p class="text-success">Iris-versicolor</p>
                          <?php } else { ?> 
                            <p class="text-danger">Iris-virginica</p>
                          <?php } ?>
                          <a href="delete.php?id=<?php echo $qq['id']; ?>" class="card-link">Delete</a>
    					            <a href="update.php?id=<?php echo $qq['id']; ?>" class="card-link">Update</a>
                        </div>

                      </div><br>
                </div>
                <?php
                  

                  }
                ?>
                
            </div>
        </div>
    </body>
</html>
