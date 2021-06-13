let keyWordArr = '';

document.querySelector('[data-placement=heading]').addEventListener('input', function(el){
 
  let searchButton = document.querySelector('[data-role=search-button]');
  keyWordArr += el.target.value;
  
  let root = searchButton.getAttribute('href').split('?')[0];
  let url = root + '?key=' + keyWordArr;
  
  searchButton.setAttribute('href', url);
  keyWordArr = '';
  
})
