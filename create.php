<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Enter a new product</title>
  </head>
  <body class="container">
    <h1 class="page_header">Enter a new product</h1>

    <?php
    if($_POST){
        //connect to the databse and if quessed have no clue
        include 'config/database.php';
        try{
            //run insert query
            $query = "insert into products set name=:name, description=:description, price=:price, created=:created";

            //prepare query for killing/execute
            $statement = $conn->prepare($query);

            $name = htmlspecialchars(strip_tags($_POST['name']));
            $description = htmlspecialchars(strip_tags($_POST['description']));
            $price = htmlspecialchars(strip_tags($_POST['price']));

            //bind parameters to our query
            $statement->bindParam(':name', $name);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':price', $price);

            //specify when record was created and then bind
            $created = date('Y-m-d H:i:s');
            $statement->bindParam(':created', $created);

            //execute query
            if($statement->execute()){
                echo "<div class='alert alert-success'>Record Was created</div>";
            }else{
                echo "<div class='alert alert-danger'>Unable to save reocrd</div>";
            }

        }catch(PDOException $exception){
            die('ERROR' . $exception->getMessage());
        }
    }
    ?>

    <h2>Please enter a new product using the form below....</h2>
    

<form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Object Class</label>
        <br>
        <input type="text" class="form-control" name="objectclass" placholder="object class" required>
        <br><br>

        <label>Item Number</label>
        <br>
        <input type="text" class="form-control" name="itemnumber" placholder="item number" required>
        <br>
        <label>Blurb</label>
        <br>
        <input type="text" class="form-control" name="objectclass" placholder="object class" required>
        <br><br>
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

<p><a href="index.php" class="btn btn-warning">Back to index page.</a></p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>