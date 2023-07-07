/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
require('bootstrap');
// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';

import './comment.js';


// pour afficher le Flash Message
var toastLiveExample = document.getElementById('liveToast')

if (toastLiveExample) {
    toastLiveExample.classList.add('show');
}
