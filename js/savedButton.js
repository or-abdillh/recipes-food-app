document.querySelector('body').addEventListener('click', function(el){
  let current = el.target.parentNode.dataset;
  
  if ( current.role == 'saved-button' ){
    let recipe = {
      key : current.key,
      title : current.title,
      thumb : current.thumb,
      times : current.times,
      portion : current.portion,
      difficulty : current.difficulty
    }
    let savedPost = JSON.parse(localStorage.getItem('savedPost'))
    
    let isSame = false;
    savedPost.recipes.forEach(item => {
      if ( recipe.key == item.key ) isSame = true;
    })
    
    if ( isSame !== true ) savedPost.recipes.push(recipe);
    
    localStorage.setItem('savedPost', JSON.stringify(savedPost))
    el.target.parentNode.innerHTML = `
      <i class="fas fa-check"> </i>
      <p class="font-sm mb-0 ms-1"> Saved </p>
    `;
  }
})