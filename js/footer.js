function renderFooter(element) {
  let template = `
     <p class="mb-0 text-center fs-300 font-sm">
       Copyright &copy; or_abdillh 2021
     </p>
      <p class="mb-0 text-center font-sm">
        made with a cup of
        <i class="fas fa-coffee font-sm text-orange"></i>
        and
        <i class="fas fa-heart font-sm text-orange"></i>
        at Handil Bakti, Barito Kuala - South Borneo
      </p>
  `;
  element.innerHTML = template;
}

const footerEl = document.querySelector('footer');
renderFooter(footerEl);