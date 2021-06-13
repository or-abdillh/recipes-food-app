<?php

//Render content at "Recomended for you" section
function render_recipes_recom ($data){
  $title = $data["title"];
  $key = $data["key"];
  $thumb = $data["thumb"];
  
  $template = <<<"EOT"
  <div class="card rounded-5 mx-1 overflow-hidden">
    <img src="$thumb" width="100%" alt="$thumb" />
    <div class="layer px-3 pt-2 pb-1">
      <p class="title fw-bold fw-300 text-white mb-0">$title</p>
      <a class="text-white link text-decoration-none float-end" href="view/?key=$key">
       <span class="font-sm fw-300 mt-2 d-flex align-items-center">
         <i class="fas fa-eye mx-1 font-sm"></i>
           Read more
       </span>
      </a>
    </div>
  </div>
EOT;
  
  return $template;
}

//Render content at "Explore" section and search results 

function render_recipes_explore ($data, $serving = false, $dificulty = true, $home = true){
  $title = $data["title"];
  $key = $data["key"];
  $thumb = $data["thumb"];
  $times = $data["times"];
  $portion = $serving == false ? $data["portion"] : $data["serving"];
  $dificulty = $dificulty == true ? $data["dificulty"] : $data["difficulty"];
  $href = $home == true ? "view/" : "../view/";
  
  $template = <<<"EOT"
    <div class="recipe-card mx-1 mt-1 mb-1 shadow-sm overflow-hidden">
      <img src="$thumb" loading="lazy" width="100%" alt="$title" />
      <div class="recipe-info mt-1 d-flex flex-nowrap">
       <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
         <i class="far fa-clock text-orange font-xsm"></i>
           $times
        </span>
        <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
          <i class="fas fa-utensils text-orange font-xsm"></i>
           $portion
        </span>
        <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
          <i class="fas fa-walking text-orange font-xsm"></i>
            $dificulty
        </span>
      </div>
      <div class="recipe-title px-1 mt-2 mb-3">
        <a href="$href?key=$key" class="text-decoration-none link text-dark fw-500 font-md">$title</a>
      </div>
    </div>
EOT;

  return $template;
}

//Render category
function render_categorys ($data){
  
  $key = $data["key"];
  $name = $data["category"];
  return <<<"EOT"
    <a class="text-decoration-none link text-white bg-orange mx-1 px-1 py-1 subtitle fw-bold rounded d-inline-block mt-1" href="search/?category=$key">$name</a>
EOT;
}

//Render recipes details at View page
function render_recipe_details ($data){
  
  $title = $data["title"];
  $thumb = $data["thumb"];
  $times = $data["times"];
  $portion = $data["servings"];
  $dificulty = $data["dificulty"];
  $author = $data["author"]["user"];
  $date = $data["author"]["datePublished"];
  
  $template = <<<"EOT"
    <ul class="list-style-none px-1">
      <li>
        <h5>$title</h5>
      </li>
      <li>
        <img class="rounded border" src="$thumb" width="100%" alt="$title" />
      </li>
      <li>
        <p class="font-md mt-1 mb-0">By $author at $date</p>
      </li>
      <li class="d-flex font-md align-items-center">
        <i class="far fa-clock text-orange me-1 font-md"></i>
         $times
      </li>
      <li class="font-md d-flex align-items-center">
        <i class="fas fa-utensils text-orange me-1 font-md"></i>
          $portion
      </li>
      <li class="d-flex font-md align-items-center">
        <i class="fas fa-walking text-orange me-1 font-md"></i>
         $dificulty
      </li>
    </ul>
EOT;

  return $template;
}

//Render ingredients
function render_ingredient ($data){

  return '<span class="text-decoration-none font-md fs-500 fw-bold text-white bg-orange-sm me-1 d-block px-2 py-1 subtitle rounded d-inline-block mt-1">' .$data .'</span>';
}

//Render step by step
function render_step ($data){
  
  return '<span class="text-decoration-none font-md fs-500 fw-bold text-white bg-orange-sm me-1 d-block px-2 py-1 subtitle rounded d-inline-block mt-1 break-word overflow-scroll">'. $data .'</span>';
}

//Render actiona buttons
function render_action_buttons ($data, $key){
  
  $title = $data["title"];
  $thumb = $data["thumb"];
  $times = $data["times"];
  $portion = $data["servings"];
  $dificulty = $data["dificulty"];
    
  $template = <<<"EOT"
    <div data-role="share-button" data-title="$title" class="px-3 py-2 rounded me-2 font-md d-flex align-items-center btn btn-primary text-white fw-bold">
      <i class="fas fa-share-alt"></i>
      <p class="font-sm mb-0 ms-1">Share</p>
    </div>
    <div class="btn px-3 py-2 rounded me-2 font-md d-flex align-items-center btn-secondary text-white fw-bold" data-role="saved-button" data-title="$title" data-key="$key" data-times="$times" data-difficulty="$dificulty" data-portion="$portion" data-thumb="$thumb">
      <i class="far fa-bookmark"></i>
      <p class="font-sm mb-0 ms-1">Save</p>
    </div>
EOT;

  return $template;
}

//Render search results details
function render_searching_detail ($key, $found){
  $template = <<<"EOT"
    <div class="col-12 px-3 d-flex justify-content-between">
      <p class="sct-title mb-0">Search results for
        <br />
          <strong>
            '$key'
          </strong>
        <br />
        <i class="font-sm fw-300">$found results found</i>
      </p>
      <p><i class="fas fa-chevron-down"></i></p>
    </div>
EOT;

  return $template;
}
?>