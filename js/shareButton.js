const shareBtn = document.querySelector('[data-role=share-button]');

shareBtn.addEventListener('click', function(){
  if ( navigator.share ){
    navigator.share({
      title : this.dataset.title,
      url : window.location.href
    }).then(result => {
      console.log(result)
    }).catch(err => {
      console.error(err)
    })
  } else {
    
  }
})