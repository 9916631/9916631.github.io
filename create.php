<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../crud_scp2/css/main.css">
    <title>Create SCP-Foundation subject form</title>
  </head>
  <body class="container body">

    <?php
    
    include 'config/connection.php';

    if(isset($_POST['submit']))//if this page gets submit valiue then run code
    {
       try
       {
         //insert items from form
        //insert query createing parameters to field use same name as field do this order 
        $query = "insert into subject set item=:item, class=:class, containment=:containment, description=:description, image=:image";
        
       
        $statement =$conn->prepare($query);//with this you can create the record succesfully

        $item = htmlspecialchars(strip_tags($_POST['item']));
        $class = htmlspecialchars(strip_tags($_POST['class']));
        $containment = htmlspecialchars(strip_tags($_POST['containment']));
        $description = htmlspecialchars(strip_tags($_POST['description']));
        $image = htmlspecialchars(strip_tags($_POST['image']));

        //bind first
        $statement->bindParam(':item', $item);
        $statement->bindParam(':class', $class);
        $statement->bindParam(':containment', $containment);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':image', $image);

         //execute query
         if($statement->execute()){
          echo "<div class='alert alert-success'>Record Was created successfully</div>";
      }else{
          echo "<div class='alert alert-danger'>Sorry, unable to save record, please try again.</div>";
      }

  }catch(PDOException $exception){
      die('ERROR' . $exception->getMessage());
  }
}
?>

    <div class="card mt-3">
    <h1 class="card-header bg-dark text-center text-warning">Create new SCP-Foundation subject</h1>    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group"> 
    <br>   
        <label><strong>SCP Item number:</strong></label>
        <br>
        <input type="text" name="item" class="form-control">
        <br>
        <label><strong>SCP Class:</strong></label>
        <br>
        <input type="text" name="class" class="form-control">
        <br>
        <label><strong>Containment:</strong></label>
        <br>
        <textarea class="form-control" name="containment"></textarea>
        <br>
        <label><strong>Description:</strong></label>
        <br>
        <textarea class="form-control" name="description"></textarea>
        <br>
        <label><strong>Image</strong></label>
        <input type="text" name="image" class="form-control">
        <br>
        <input type="submit" name="submit" value="Create SCP Subject" class="btn btn-primary">
        <a href="index.php" class="btn btn-primary float-right">Back to home page</a>
        <br>        
    </form> 
    <div class="card-footer bg-dark border-warning text-center"></div>
  </div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>