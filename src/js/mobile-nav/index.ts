const toggleButton = document.querySelectorAll('.js-nav-toggle-button');
const mobileNav = document.querySelector('.js-mobile-nav-container');

function mobileNavListener() {
  document.body.classList.toggle('js-nav-open');
}

function addMobileNavListener() {
  if (!toggleButton || !mobileNav) {
    console.error('Mobile Nav elements not found');
    return;
  }

  mobileNav.classList.remove('hidden');
  mobileNav.classList.add('block');
  toggleButton.forEach((button) => button.addEventListener('click', mobileNavListener));
}

addMobileNavListener();

export {};
