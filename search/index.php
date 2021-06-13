<?php
require("../server/c_url.php");
require("../server/templating.php");

if ( isset($_GET["key"]) ){
  $key = $_GET["key"];
  $endpoint = "https://masak-apa-tomorisakura.vercel.app/api/search/?q=$key";
  $results = curl($endpoint)["results"];
  $category = false;
} else if ( isset($_GET["category"]) ){
  $key = $_GET["category"];
  $category = true;
  $endpoint = "https://masak-apa-tomorisakura.vercel.app/api/categorys/recipes/:$key";
  $results = curl($endpoint)["results"];
}
$null_results = is_null($results);

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
    <section data-role="tracker" data-url="search recipe" class="px-3 mt-3 mb-1 w-100">
      
    </section>
    
    <!-- Keyword  -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <!-- Searching details -->
          <?php
            //Render searching detail
            if ( $null_results != 1 ){
              $found = count($results);
             echo render_searching_detail($key, $found);
            }
          ?>
          <!-- Results card -->
          <div class="col-12 px-3 mt-3 d-flex flex-wrap justify-content-between">
            <?php
              if ( $null_results != 1 ) {
               foreach( $results as $recipe ){
                 echo render_recipes_explore($recipe, $category == true? false : true, $category == true ? true : false, false);
                }
              }
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
    
  </body>
</html>