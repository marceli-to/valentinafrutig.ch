const THRESHOLD = 80;

let lastY = 0;
let ticking = false;

function update() {
  const y = window.scrollY;
  const goingDown = y > lastY;
  const past = y > THRESHOLD;

  document.querySelectorAll('[data-shy]').forEach((el) => {
    el.classList.toggle('is-shy', goingDown && past);
  });

  lastY = y;
  ticking = false;
}

function onScroll() {
  if (ticking) return;
  ticking = true;
  requestAnimationFrame(update);
}

export function init() {
  lastY = window.scrollY;
  window.addEventListener('scroll', onScroll, { passive: true });
}
