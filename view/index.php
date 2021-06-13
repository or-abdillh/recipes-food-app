<?php
require("../server/c_url.php");
require("../server/templating.php");

if ( isset($_GET["key"]) ){
  $key = $_GET["key"];
  $endpoint = "https://masak-apa-tomorisakura.vercel.app/api/recipe/:$key";
  
  $results = curl($endpoint)["results"];
  $ingredients = $results["ingredient"];
  $steps = $results["step"];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FA9151" />
    
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Web manifest -->
    <link rel="manifest" href="../manifest.json" type="aplication/json"/>
    
    <!-- Icons -->
    <link rel="icon" href="../assets/icons/icon-72x72.png" type="images/png" />
    
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/utilities.css" type="text/css" media="all" />
    
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Recipes Food</title>
  </head>
  <body>
    
    <!-- HEADING -->
    <section data-placement="heading">
      <!-- Render by heading.js -->
    </section>
    
    <!-- Tracker -->
    <section data-role="tracker" data-url="view recipe" class="px-3 mt-3 mb-1 w-100">
      
    </section>
    
    <!-- View recipes , recipe details -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12">
            <?php
              //Render recipe details
              echo render_recipe_details($results);
            ?>
          </div>
      </div>
    </section>
    
    <!-- Ingredients -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-12 px-3 d-flex justify-content-between">
            <p class="sct-title fw-500 mb-0">Ingredients</p>
            <p><i class="fas fa-chevron-down"></i></p>
          </div>
          <div class="col-12 px-3 d-flex flex-wrap">
            <?php
              //render every ingredient
              foreach ($ingredients as $item) {
                echo render_ingredient($item);
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Step by step -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 px-3 d-flex justify-content-between">
            <p class="sct-title fw-500 mb-0">Step by step</p>
            <p><i class="fas fa-chevron-down"></i></p>
          </div>
          <div class="col-12 px-3">
            <?php
              //render step by step
              foreach( $steps as $step ){
                echo render_step($step);
              }
            ?>
          </div>
          <hr class="mt-3 fw-bold" />
          <div class="col-4 mt-1 d-flex ms-1">
            <?php
              //Render action buttons
              echo render_action_buttons($results, $_GET["key"]);
              
            ?>
          </div>
        </div>
      </div>
    </section>
    
    <!-- About developer -->
    <section data-placement="about">
      
    </section>
    
    <!-- Footer -->
    <footer class="px-3">
      
    </footer>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Script custom and render element-->
    <script src="../js/heading.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/about.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/footer.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/tracker.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/searching.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/savedButton.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/shareButton.js" type="text/javascript" charset="utf-8"></script>
    
  </body>
</html>