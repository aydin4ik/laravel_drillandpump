
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Form from './core/Form';
window.Form = Form;

import './bootstrap';

window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy, {
  defaultIconPack: 'fa'
});

// Parallax-js
import Parallax from 'parallax-js';



import './manage';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('file-upload', require('./components/FileUpload.vue'));
Vue.component('slide-content-lang', require('./components/SlideContentLang.vue'));

var scene = document.getElementsByClassName('slide');
for (let index = 0; index < scene.length; index++) {
  const element = scene[index];

  if( element != null){
    var parallaxInstance = new Parallax(element, {
      relativeInput: true,
      hoverOnly: true,
    });
  }
  
  
}


// custom libraries
import Swiper from 'swiper';

var mySwiper = new Swiper ('.swiper-container', {
  // Optional parameters
  loop: false,
  autoplay: {
    delay: 5000,
  },
});


import moment from 'moment';
moment().format();