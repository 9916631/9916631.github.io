<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../crud_scp2/css/main.css">
  <link rel="stylesheet" type="text/js" href="../crud_scp2/js/scp.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>SCP-Foundation</title>
</head>

<body class="container body">
  <!--style change background kool-->

  <?php include 'config/connection.php' ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="images/scp_logo.svg" class="img-fluid" style="width:50px; height: auto;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active hoverable">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <?php foreach ($record as $menu) : ?>
          <li class="nav-item active hoverable">
            <a class="nav-link" href="index.php?item='<?php echo $menu['item']; ?>'"><?php echo $menu['item']; ?></a>
          </li>
        <?php endforeach; ?>

        <li class="nav-item active hoverable">
          <a class="nav-link" href="create.php">Create new SCP-Foundation subject</a>
        </li>
        <li class="nav-item active hoverable">
          <a class="nav-link" href="starwars.php">StarWars</a>
        </li>
        <li class="nav-item active hoverable">
          <a class="nav-link" href="api_scp.php">SCP Foundation API</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php

  if (isset($_GET['item'])) //if button was clicked then do all this
  {
    //select record from database
    $scp = trim($_GET['item'], "'");

    $item = "select * from crudscptable where item = '$scp'";
    $subject = $conn->prepare($item);
    $subject->execute();

    $display = $subject->fetch(PDO::FETCH_ASSOC); //associate array

    $id = $display['id'];
    echo "
        <div class='card mt-3'>
        <h1 class='card-header text-center bg-dark text-center text-warning'>Subject: {$display['item']} - {$display['class']}</h1>
        <div class='card-body'>
        <a href='update.php?id={$id}' class='btn btn-warning float-right'>Update record</a>        
        <h5 class='card-title'>Containment</h5>
        <p class='card-text'>{$display['containment']}</p>
        <p><img class='img-fluid' src='{$display['image']}' style='width: 75% height: auto; box-shadow: 3px, 3px, 3px; margin-left: auto; margin-right:auto; display: block;'></p>
        <h5 class='card-title'>Description</h5>
        <p class='card-text'>{$display['description']}</p>        
        </div>
        <div class='card-footer bg-dark border-warning text-center'></div>
        </div>
        
        ";
  } else {
    echo '
        <div class="card mt-3">
        <h1 class="card-header bg-dark text-center text-warning">
            SCP-Foundation
            </h1>
            <div class="card-body">
            <h5 class="card-title">Welcome to the SCP-Foundation</h5>
            <p class="card-text">Please use the menu above to Create, Read, Update or delete the SCP-Foundation subjects.
            <br>
            <br>
            You can also view Star wars charactors by clicking the Star wars tab, it will take between 30seconds to a minute to display the information as we are pulling the information from
            the star wars API server.
            <br> 
            <br> 
            You can also view the SCP foundation in a new way by clicking the SCP foundation tab and it will load using our own API with the 
            SCP foundation as json file to connect to. </p>            
            </div>
            <div class="card-footer bg-dark border-warning text-center">
            </div>
        </div>
        
        ';
  }

  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<footer>
    <div class="jumbotron jumbotron-fluid bg-dark p-4 mt-5 mb-0">
      <div class="container bg-warning p-3">
        <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi">
            <div class="card bg-dark border-0">
              <div class="card-body text-center">
                <h5 class="card-title text-white display-4" style="font-size:30px">SCP Foundation</h5>
                <a class="text-light d-block lead" style="margin-left: -20px" href="#"><i class="fa fa-phone mr-2"></i>+64 0800 1234561</a>
                <a class="text-light d-block lead" href="#"><i class="fa fa-envelope mr-2"></i>scpfoundation@gmail.com</a>
              </div>
            </div>
          </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi">
            <div class="card bg-dark border-0">
              <div class="card-body text-center">
              <h5 class="card-title text-white display-4" style="font-size:30px">SCP Foundation</h5>        
                  <a class="text-light" href="https://www.facebook.com"><i class="fa fa-facebook-square fa-fw fa-2x"></i></a>              
                  <a class="text-light" href="https://www.twitter.com/"><i class="fa fa-twitter-square fa-fw fa-2x"></i></a>              
                  <a class="text-light" href="https://www.instagram.com"><i class="fa fa-instagram fa-fw fa-2x"></i></a>              
                  <a class="text-light " href="https://www.linkedin.com"><i class="fa fa-linkedin fa-fw fa-2x"></i></a>              
              </div>
            </div>
          </div>	        
          <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card bg-dark border-0">
              <div class="card-body text-light text-center">
                <h5 class="card-title text-white display-4" style="font-size:30px">Zina Vixen</h5>
              <p class="d-inline lead">SCP Foundation, kool and wonderful SCP things © 2020<br>            
              </p>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </div>
  </footer>

</html>