document.addEventListener('click', function(el){
  let current = el.target;
  
  if ( current.parentNode.dataset.role == 'delete-button' ){
    let key = current.parentNode.dataset.key;
    let savedPost = JSON.parse(localStorage.getItem('savedPost'));
    
    savedPost.recipes.forEach( (item, index ) => {
      if ( item.key === key ) {
        savedPost.recipes.splice(index, 1);
        localStorage.setItem('savedPost', JSON.stringify(savedPost));
        
        setTimeout(()=> {
          window.location.reload();
        }, 500)
      }
    })
  }
})