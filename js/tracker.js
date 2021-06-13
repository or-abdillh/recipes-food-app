function renderTracker(element) {
  let url = element.dataset.url,
      template = `
      <span class="bg-light text-dark d-block px-3 py-2 font-sm">
        <a class="text-decoration-none link text-dark font-sm" href="../">Home</a> / ${url}
      </span>
  `
  element.innerHTML = template;
}

const trackerEl = document.querySelector('[data-role=tracker]');
renderTracker(trackerEl);