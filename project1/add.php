<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add Iris</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Add Iris to Database</h1>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label>Sepal length in cm:</label>
                    <input type="text" class="form-control" placeholder="Sepal length in cm" name="sepall"/>
                </div>
                <div class="form-group">
                    <label>Sepal width in cm:</label>
                    <input type="text" class="form-control" placeholder="Sepal width in cm"  name="sepalw"/>
                </div>
            
                <div class="form-group">
                    <label>Petal length in cm:</label>
                    <input type="text" class="form-control" placeholder="Petal length in cm"  name="petall"/>
                </div>
                
                <div class="form-group">
                    <label>Petal width in cm:</label>
                    <input type="text" class="form-control" placeholder="Petal width in cm"  name="petalw"/>
                </div>
                <div class="form-group">
                    <label>Class:</label>
                    <select class="form-control" name="class">
                        <option value="0" >Iris-setosa</option>
                        <option value="1">Iris-versicolor</option>
                        <option value="2">Iris-virginica</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" class="form-control" placeholder="Date" name="idate">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-danger" name="btn">
                </div>
            </form>
        </div>
		<?php
           if(isset($_POST["btn"]))
           {
	           include("connect.php");
               $sepal_length=$_POST['sepall'];
               $sepal_width=$_POST['sepalw'];
               $petal_length=$_POST['petall'];
               $petal_width=$_POST['petalw'];
               $class=$_POST['class'];
               $date=$_POST['idate'];
    

               $q="insert into iris(sepal_length, sepal_width ,petal_length ,petal_width ,class ,date)values('$sepal_length','$sepal_width','$petal_length','$petal_width','$class','$date')";

               mysqli_query($con,$q);
               header("location:index.php");

	 
            }
		
         ?>
		
    </body> 
</html>
