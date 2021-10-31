<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../crud_scp2/css/main.css"><!--i have had to add the 2 dots for it to connect but sometimes you dont need to-->
  <link rel="stylesheet" type="text/css" href="../crud_scp2/js/scp.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Star Wars</title>
</head>

<body class="container body">
<!-- Nav bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="images/scp_logo.svg" class="img-fluid" style="width:50px; height: auto;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link hoverable" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link hoverable" href="starwars.html">StarWars</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link hoverable" href="api_scp.php">SCP Foundation API</a>
        </li>
      </ul>
    </div>
  </nav>

<!-- get star wars api -->
  <?php
  $planets = json_decode(file_get_contents('https://swapi.dev/api/planets/?page=1'));
  $species = getApiResults('https://swapi.dev/api/species/?page=1'); 

  $schema = json_decode(file_get_contents('https://swapi.dev/api/species/schema/?page=1')); 
  ?>

<div class="bg-dark">
  <h1 class="text-warning text-center"><strong>Welcome to the Starwars page, we have displayed <?php print count($species);  ?> species of starwars for you to enjoy</strong></h1>
</div>

<a href="index.php" class="btn btn-primary">Back to home page</a>

<!-- get satw arws api -->
  <div class="row">
    <?php foreach ($species as $display) : 
    $people = [];
    foreach($display->people as $peopleUrl) {
        $person = getApiResult($peopleUrl);
        if($person) {
            $people[] = $person->name;
        }
    }
    ?>
      <div class="col-xl-6 col-sm-12"><!--col-6 is the one that works good-->
        <div class="card mt-3">
          <div class="card-body">
            <h1 class="card-header bg-dark text-center text-warning">STARWARS</h1>
            <h5 class="card-title"><strong>Name:</strong> <?php echo $display->name; ?></h5>
            <p class="card-text"><strong>Species:</strong> <?php echo $display->classification; ?></p>
            <p class="card-text"><strong>Homeworld:</strong> <?php echo $display->homeworld; ?></p>
            <p class="card-text"><strong>Language:</strong> <?php echo $display->language; ?></p>
            <p class="card-text"><strong>Average life span:</strong> <?php echo $display->average_lifespan; ?></p>

            <p class="card-text"><strong>People:</strong> <?php echo implode(', ',$people); ?></p>
            <div class="card-footer bg-dark border-warning text-center"></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../crud_scp/js/main.js"></script>
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
                <h5 class="card-title text-white display-4" style="font-size:30px">Starwars</h5>
                <a class="text-light d-block lead" style="margin-left: -20px" href="#"><i class="fa fa-phone mr-2"></i>+64 0800 7891011</a>
                <a class="text-light d-block lead" href="#"><i class="fa fa-envelope mr-2"></i>starwars12345@gmail.com</a>
              </div>
            </div>
          </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi">
            <div class="card bg-dark border-0">
              <div class="card-body text-center">
              <h5 class="card-title text-white display-4" style="font-size:30px">Starwars</h5>        
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
              <p class="d-inline lead">Starwars, kool and wonderful starwars things © 2020<br>            
              </p>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </div>
  </footer>
</html>

<?php
function getApiResults($file) {
    $results = [];
    while($stop != true) {
        $res = json_decode(file_get_contents($file));
        if($res->results) {
            $results = array_merge($results,$res->results);
            if(!$res->next) return $results;
            $file = $res->next;
        } else {
            $stop = true;
        }
    }
    return $results;
}
function getApiResult($file) {
    $res = json_decode(file_get_contents($file));
    if($res) {
        return $res;
    }
    return false;
}
?>