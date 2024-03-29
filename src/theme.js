import './scss/style.scss';

// jQuery
import $ from 'jquery'
window.jQuery = window.$ = $

// Bootstrap JS
import 'bootstrap';

// Turbo SPA
import * as Turbo from "@hotwired/turbo";
Turbo.setProgressBarDelay(500);

import './js/header';

// Page Change
document.addEventListener("turbo:load", function() {
    // console.log('Page Changed');
});




