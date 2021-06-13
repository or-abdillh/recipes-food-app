function renderHeading (heading) {
  let srcImg = heading.dataset.root == 'home' ? 'assets/img/logo.png' : '../assets/img/logo.png';
  let linkToPageSearch = heading.dataset.root == 'home' ? 'search/?key=' : '../search/?key=';
  let template = `
      <div class="container bg-orange">
        <div class="row mx-0 px-1">
          <div class="col-12 mt-2 d-flex align-items-center justify-content-center">
            <img src="${srcImg}" class="mx-1" width="55" height="55" alt="logo" />
            <span class="fw-bold fs-5 text-white">RECIPES FOOD</span>
          </div>
          <div class="col-12 mt-3">
            <div class="input-group input-group-md mb-3">
              <input type="text" data-role="search-area" class="form-control py-2 px-3" placeholder="What are you cooking today ?" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              <a class="input-group-text text-decoration-none border-none bg-white" data-role="search-button" href="${linkToPageSearch}" id="inputGroup-sizing-sm">
                <i class="fas fa-search text-secondary"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
  `;
  heading.innerHTML = template;
}

let headingEl = document.querySelector('[data-placement=heading]');
renderHeading(headingEl);

//Check if variabel savedPost not defined at localStorage
window.addEventListener('load', () => {
  let savedPost = {
    recipes: []
  }
  //Define variabel savedPost
  if (localStorage.getItem('savedPost') == null) {
    localStorage.setItem('savedPost', JSON.stringify(savedPost))
  }
})