<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Read a single record</title>
  </head>
  <body class="container">
    <h1>Read a single record</h1>

    <?php
    //first check if id value was sent to this page via get method (?id=) usual from link
    if(isset($_GET['id']))
    {
        include 'config/database.php';
        $id = $_GET['id'];
    }
    else
    {
        die('Error: Record id not found');
    }

    try{
        $query = "select id, itemnum, class, blurb, h1, h2, h3, h4, p1, p2, p3, p4, img1, img2, img3 from scp-foundation where id = ? limit 0,1";
        $statement = $conn->prepare(($query));

        //this is to bind the ? to id
        $statement->bindParam(1, $id);
        $statement->execute();
        
        //store retrieved reord into assoiciate array
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //values from the reocrd
        $itemnum = $row['itemnum'];
        $class = $row['class'];
        $blurb = $row['blurb'];
        $h1 = $row['h1'];        
        $h2 = $row['h2'];
        $h3 = $row['h3'];
        $h4 = $row['h4'];
        $p1 = $row['p1'];
        $p2 = $row['p2'];
        $p3 = $row['p3'];
        $p4 = $row['p4'];
        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];
    }
    catch(PDOException $exception){
        die('Error: ' . $exception->getMessage());
    }    
    ?>    
    

    <div class="row">
      <div class="col">
        <div class=""><p><?php echo htmlspecialchars($itemnum, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($class, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($blurb, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($img1, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($h1, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($p1, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($h2, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($p2, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($h3, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($p3, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($h4, ENT_QUOTES);?></p></div>
        <div class=""><p><?php echo htmlspecialchars($p4, ENT_QUOTES);?></p></div>
      </div>
    </div>
    <p><a href="index.php" class="btn btn-info">Back to index page</a></p>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>