<?php
require("server/c_url.php");
require("server/templating.php");

$end_point = "https://masak-apa-tomorisakura.vercel.app/api/recipes-length/?limit=5";
$recipes = curl($end_point)["results"];

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FA9151" />
    
    <!-- Web manifest -->
    <link rel="manifest" href="manifest.json" type="aplication/json"/>
    
    <!-- Icons -->
    <link rel="icon" href="assets/icons/icon-72x72.png" type="images/png" />
    
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/utilities.css" type="text/css" media="all" />
    
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    
    <title>Recipes Food</title>
  </head>
  <body>
    
    <!-- HEADING -->
    <section data-placement="heading" data-root="home">
      <!-- Render by heading.js -->
    </section>
    
    <!-- Recomended For You -->
    <section id="recomended">
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 px-3 d-flex mb-0 justify-content-between">
            <p class="sct-title fw-500">Recomended for you</p>
            <p><i class="fas fa-chevron-right"></i></p>
          </div>
          <div class="col-12 px-3 d-flex overflow-scroll none-scrollbar">
            <!-- Card recipe -->
            <?php
            
            //render 5 element as recomended for user
            foreach($recipes as $recipe){
              echo render_recipes_recom($recipe);
            }
            
            ?>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Categorys -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 px-3 d-flex justify-content-between">
            <p class="sct-title fw-500 mb-0">Categorys</p>
            <p><i class="fas fa-chevron-right"></i></p>
          </div>
        </div>
        <div id="category-badge" class="col-12 px-2 w-100 text-center justify-content-between none-scrollbar">
          <!-- Render categorys -->
          <?php
            $endpoint = "https://masak-apa-tomorisakura.vercel.app/api/categorys/recipes";
            $categorys = curl($endpoint)["results"];
            foreach ($categorys as $item){
              echo render_categorys($item);
            }
          ?>
        </div>
      </div>
    </section>
    
    <!-- Explore -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 px-3 d-flex justify-content-between">
            <p class="sct-title fw-500 mb-0">Explore</p>
            <p><i class="fas fa-chevron-down"></i></p>
          </div>
          <!-- Content -->
          <!-- Card Recipe --->
          <div class="col-12 px-3 d-flex flex-wrap justify-content-between">
            <?php
            
            for ( $i = 0; $i <= 3; $i++ ) {
              $end_point = "https://masak-apa-tomorisakura.vercel.app/api/recipes/:$i";
              $recipes = curl($end_point)["results"];
              foreach( $recipes as $recipe ){
                echo render_recipes_explore($recipe);
              }
            }
            
            ?>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Saved Post -->
    <section>
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 px-3 d-flex justify-content-between">
            <p class="sct-title fw-500 mb-0">Saved Post</p>
            <p><i class="fas fa-chevron-down"></i></p>
          </div>
          <!-- Saved card -->
          <div class="col-12 px-3" data-role="saved-post" data-root="home">
            
          </div>
        </div>
      </div>
    </section>
    
    <!-- About developer -->
    <section data-placement="about" data-root="home">
      
    </section>
    
    <!-- Footer -->
    <footer class="px-3">
      
    </footer>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
    <!-- Script custom and render element-->
    <script src="js/min-width.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/heading.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/about.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/footer.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/searching.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/renderSavedPost.js" type="text/javascript" charset="utf-8"></script>
    
  </body>
</html>