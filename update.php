<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Update Product Record</title>
  </head>
  <body class="container">
    <h1 class="page-header">Update Product Record</h1>

    <!--php code to select desired record-->
    <?php
    //check if id value was sent to this page via get method(?=) from a link
    $id = isset($_GET['id']) ? $_GET['id'] : die("ERROR: Record ID not found");

    //connect to database
    include 'config/database.php';

    //get the current record frm the db based id value
    try{
        $query = "select id, name, blurb, description, price from products where id = ? limit 0,1";

        //bind our id
        $read = $conn->prepare($query);
        $read->bindParam(1, $id);
        $read->execute();

       $row = $read->fetch(PDO::FETCH_ASSOC);

        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
    }
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }

    if($_POST){
        try{
            //update sequql query
            $query = "update products set name=:name, description=:description, price=:price where id=:id";
            //prepare the query
            $update = $conn->prepare($query);
            //save post values from form to stop hackewrs with special chars.
            $id = htmlspecialchars(strip_tags($_POST['id']));
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $description = htmlspecialchars(strip_tags($_POST['description']));
            $price = htmlspecialchars(strip_tags($_POST['price']));

            //bind the placeholder to actial parameteres to stop fields inserted
            $update->bindParam(':name', $name);
            $update->bindParam(':description', $description);
            $update->bindParam(':price', $price);
            $update->bindParam(':id', $id);

            //execute the query update
            if($update->execute()){
                echo "<div class='alert alert-success'>Record {$id} was updated.</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Unable to update record, please try again</div>";
            }

        }
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
    else{
        echo "<div class='alert alert-danger'>Record is ready to updated</div>";
    }
    ?>

    <h2>Use this form to update thus record</h2>

    <form class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id={$id}'); ?>" method="post">
        <label>Object Class</label>
        <br>
        <input type="text" class="form-control" name="objectclass" placholder="object class" required>
        <br><br>

        <label>Item Number</label>
        <br>
        <input type="text" class="form-control" name="itemnumber" placholder="item number" required>
        <label>Heading One</label>
        <br>
        <input type="text" class="form-control" name="h1" placholder="heading one" required>
        <br><br>

        <label>Paragraph One</label>
        <br>
        <textarea class="form-control" name="p1" rows="5" required></textarea>
        <br><br>
        <label>Image One</label>
        <br>
        <input type="text" class="form-control" name="img1" placholder="image one">
        <br><br>
        <hr width="75%">

        <label>Heading Two</label>
        <br>
        <input type="text" class="form-control" name="h2" placholder="heading two">
        <br><br>

        <label>Paragraph Two</label>
        <br>
        <textarea class="form-control" name="p2" rows="5"></textarea>
        <br><br>

        <label>Image Two</label>
        <br>
        <input type="text" class="form-control" name="img2" placholder="image two">
        <br><br>
        <hr width="75%">

        <label>Heading Three</label>
        <br>
        <input type="text" class="form-control" name="h3" placholder="heading three" >
        <br><br>

        <label>Heading Four</label>
        <br>
        <input type="text" class="form-control" name="h4" placholder="heading four" >
        <br><br>

        <label>Paragraph Four</label>
        <br>
        <input type="text" class="form-control" name="p4" placholder="Paragraph four" >
        <br><br>

        <label>Paragraph Three</label>
        <br>
        <textarea class="form-control" name="p3" rows="5"></textarea>
        <br><br>

        <label>Image Three</label>
        <br>
        <input type="text" class="form-control" name="img3" placholder="image three">
        <br><br>
        <hr width="75%">

        <input type="submit" class="btn btn-primary" name="submit" value="Submit New Record">
    </form>

    <p><a href="index.php" class="btn btn-info">Back to index page</a></p>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>