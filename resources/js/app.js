/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

(function($) {
    "use strict"; // Start of use strict
  
    // Floating label headings for the contact form
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
      $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
      $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
      $(this).removeClass("floating-label-form-group-with-focus");
    });
  
    // Show the navbar when the page is scrolled up
    var MQL = 992;
  
    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
      var headerHeight = $('#mainNav').height();
      $(window).on('scroll', {
          previousTop: 0
        },
        function() {
          var currentTop = $(window).scrollTop();
          //check if user is scrolling up
          if (currentTop < this.previousTop) {
            //if scrolling up...
            if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
              $('#mainNav').addClass('is-visible');
            } else {
              $('#mainNav').removeClass('is-visible is-fixed');
            }
          } else if (currentTop > this.previousTop) {
            //if scrolling down...
            $('#mainNav').removeClass('is-visible');
            if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
          }
          this.previousTop = currentTop;
        });
    }
  
  })(jQuery); // End of use strict
  