require('../css/app.scss');

// IE 11 polyfill
import './ie11';

// Import routing
import './routing';

// Create global $ and jQuery variables
const $ = require('jquery');
global.$ = global.jQuery = $;

// Disable scroll restoration if possible
if ('scrollRestoration' in window.history) {
  // Back off, browser, I got this...
  window.history.scrollRestoration = 'manual';
}
