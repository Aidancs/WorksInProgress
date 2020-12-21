require('./bootstrap');

// require('alpinejs');

window.Vue = require('vue');

Vue.component('image-card', require('./components/ImageCard.vue').default);

const app = new Vue({
    el: '#app',
});

