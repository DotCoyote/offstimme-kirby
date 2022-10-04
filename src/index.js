import './index.css';
import './js/scrollTo';
// eslint-disable-next-line import/no-unresolved
import 'virtual:svg-icons-register';

if (document.querySelector('.js-voices-component')) {
  import('./js/voices/voices');
}

if (document.querySelector('.js-mobile-nav')) {
  import('./js/mobile-nav/index');
}
