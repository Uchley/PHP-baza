<?php
    include("connect.php");
    if(isset($_POST['btn']))
    {
        $sepal_length=$_POST['sepall'];
        $sepal_width=$_POST['sepalw'];
        $petal_length=$_POST['petall'];
        $petal_width=$POST['petalw'];
        $class=$_POST['class'];
        $date=$_POST['idate'];
        $id = $_GET['id'];
        $q= "update iris set sepal_length='$sepal_length', sepal_width='$sepal_width', petal_length='$petal_length', petal_width='$petal_width', class='class', date='$date' where id=$id";
        $query=mysqli_query($con,$q);
        header('location:index.php');
    } 
	else if(isset($_GET['id'])) 
	{
        $q = "SELECT * FROM iris WHERE id='".$_GET['id']."'";
        $query=mysqli_query($con,$q);
        $res= mysqli_fetch_array($query);
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Update List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Update Iris List</h1>
            <form method="post">
                <div class="form-group">
                    <label>Sepal length in cm: </label>
                    <input type="text" class="form-control" name="sepall" placeholder="sepal length in cm" value="<?php echo $res['sepal_length'];?>"/>
                </div>
                <div class="form-group">
                    <label>Sepal width in cm: </label>
                    <input type="text" class="form-control" name="sepalw" placeholder="sepal width in cm" value="<?php echo $res['sepal_width'];?>"/>
                </div>
                <div class="form-group">
                    <label>Petal length in cm: </label>
                    <input type="text" class="form-control" name="petall" placeholder="petal length in cm" value="<?php echo $res['petal_length'];?>"/>
                </div>
                <div class="form-group">
                    <label>petal width in cm: </label>
                    <input type="text" class="form-control" name="petalw" placeholder="petal width in cm" value="<?php echo $res['sepal_width'];?>"/>
                </div>
                <div class="form-group">
                    <label>Iris class</label>
                    <select class="form-control" name="class">
                        <?php
                            if($res['class'] == 0) {
                            ?>
                            <option value="0" selected>Iris-setosa</option>
                            <option value="1">Iris-versicolor</option>
                            <option value="2">Iris-virginica</option>
                            <?php } else if($res['item_status'] == 1) { ?>
                            <option value="0">Iris-setosa</option>
                            <option value="1" selected>Iris-versicolor</option>
                            <option value="2"></option>Iris-virginica

                            <?php } else if($res['item_status'] == 2) { ?>
                            <option value="0">Iris-setosa</option>
                            <option value="1">Iris-versicolor</option>
                            <option value="2" selected>Iris-virginica</option>
                        <?php
                            }
                        ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="idate" placeholder="date" value="<?php echo $res['date']?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" name="btn" class="btn btn-danger">
                </div>
            </form>
        </div>
    </body> 
</html>
