function renderAbout(element) {
  let link = {
    ig : "https://www.instagram.com/or_abdillh/",
    github : "https://github.com/or-abdillh",
    fb : "https://m.facebook.com/abdillahcfc",
    img : element.dataset.root == 'home' ? 'assets/img/hero.png' : '../assets/img/hero.png'
  }
  
  let template = `
        <div class="container mt-3 mb-3">
          <div class="row">
            <div class="col-12 px-3 d-flex justify-content-between">
              <p class="sct-title fw-500 mb-0">About developer</p>
              <p><i class="fas fa-chevron-down"></i></p>
            </div>
            <div class="col-10 mx-auto bg-light rounded px-3 py-2 d-flex justify-content-center align-items-center flex-column">
              <div class="hero p-1 bg-white rounded-circle">
                <img src="${link.img}" width="100%" alt="" />
              </div>
              <p class="fw-bold mb-0">Oka R. Abdillah</p>
              <p class="font-md mb-0">Mahasiswa D3 TI - Polihasnur</p>
              <span>
                <a class="text-decoration-none text-secondary fw-bold float-end" href="${link.ig}"><i class="fab fa-instagram"></i></a>
                <a class="text-decoration-none text-secondary me-1 fw-bold float-end" href="${link.github}"><i class="fab fa-github"></i></a>
                <a class="text-decoration-none text-secondary me-1 fw-bold float-end" href="${link.fb}"><i class="fab fa-facebook"></i></a>
              </span>
            </div>
          </div>
        </div>
  `
  element.innerHTML = template;
}

const aboutEl = document.querySelector('[data-placement=about]');
renderAbout(aboutEl);