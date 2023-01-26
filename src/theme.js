import './scss/style.scss';

// jQuery
import $ from 'jquery'
window.jQuery = window.$ = $

// Bootstrap JS
import 'bootstrap';

// Turbolinks
import Turbolinks from 'turbolinks'
Turbolinks.start();

import './js/header';

// Page Change
document.addEventListener("turbolinks:load", function() {
    // console.log('Page Changed');
});




