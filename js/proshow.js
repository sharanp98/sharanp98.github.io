const container = document.querySelector('.container');
const left_area = document.querySelector('.split__layer--left');
const bar = document.querySelector('.split__handle-bar');
let skew = 0;
let delta = 0;

if (container.classList.contains('skew')) {
  skew = 1000;
}

function init () {
  container.classList.add('reset');

  bar.style.left = '50%';
  left_area.style.width = `${window.innerWidth / 2 + skew}px`;
}

function slideHandleBar (e) {
  container.classList.remove('reset');

  delta = (e.clientX - window.innerWidth / 2) * 0.5;

  bar.style.left = `${e.clientX + delta}px`;
  left_area.style.width = `${e.clientX + skew + delta}px`;
}

container.addEventListener('mousemove', slideHandleBar)
container.addEventListener('mouseleave', init);
window.addEventListener('resize', init);