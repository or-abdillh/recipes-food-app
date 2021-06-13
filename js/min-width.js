const categorys = document.querySelectorAll('#category-badge a');
const wrapper = document.getElementById('category-badge');

for ( const item of categorys ){
  let widthItem = item.offsetWidth + 12 + "px";
  item.style.minWidth = widthItem;
}

wrapper.classList.add('d-flex', 'overflow-scroll')