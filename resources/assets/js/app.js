
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);

// Parallax-js
import Parallax from 'parallax-js';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));


var app = new Vue({

    el: '#app',
    data: {}
});

var scene = document.getElementById('scene');
var parallaxInstance = new Parallax(scene, {
  relativeInput: true,
  hoverOnly: true,
});