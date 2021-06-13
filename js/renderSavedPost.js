let savedPostEl = document.querySelector('[data-role=saved-post]');
let root = savedPostEl.dataset.root;
let templateArr = [];
  
//Fetch data from localStorage savedPost
let recipes = JSON.parse(localStorage.getItem('savedPost')).recipes;

if ( recipes.length > 0 ) {
  switch (root) {
    case 'home' : 
      recipes.forEach( (item, index) => {
        
        if ( index < 3 ){
          let title = item.key.split('-').join(' ');
          let template = `
            <div class="saved-card mt-1 rounded overflow-hidden" style="background-image: url(${item.thumb})">
              <div class="saved-layer px-3 py-3">
                <a href="view/?key=${item.key}" class="font-md link text-decoration-none fw-bold text-white link">${title}</a>
              </div>
            </div>
          `;
          templateArr.push(template);
        }
      })
      let template = `
        <a href="saved/" class="link text-decoration-none d-flex align-items-center font-md text-dark fs float-end fw-300 mt-1">
          Shows all
          <i class="far fa-folder-open fw-300 ms-1"></i>
        </a>`;
      templateArr.push(template);
    break;
    default :
      recipes.forEach( recipe => {
        let template = `
          <div class="recipe-card relative mx-1 mt-1 mb-1 shadow-sm overflow-hidden">
            <img src="${recipe.thumb}" alt="${recipe.thumb}" width="100%" />
            <!-- delete button --> 
            <div class="absolute p-1 d-flex justify-content-center align-items-center text-light rounded-circle" data-key="${recipe.key}" data-role="delete-button">
              <i class="fas fa-trash font-sm link"></i>
            </div>
            <div class="recipe-info mt-1 d-flex flex-nowrap">
              <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
                <i class="far fa-clock text-orange font-xsm"></i>
                  ${recipe.times}
              </span>
              <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
                <i class="fas fa-utensils text-orange font-xsm"></i>
                  ${recipe.portion}
              </span>
              <span class="font-xsm mx-1 fw-300 fw-bold text-secondary">
                <i class="fas fa-walking text-orange font-xsm"></i>
                  ${recipe.difficulty}
              </span>
             </div>
             <div class="recipe-title px-1 mt-2 link">
               <a href="../view/?key=${recipe.key}" class="text-decoration-none link text-dark fw-300 font-md fw-bold">${recipe.title}</p>
             </div>
          </div>
          `;
          templateArr.push(template);
      })
  }
} else {
  templateArr.push('<p class="font-sm fw-400">You haven\'t saved any recipes, just start reading the recipe then save it if you need</p>');
}

  
savedPostEl.innerHTML = templateArr.join('');