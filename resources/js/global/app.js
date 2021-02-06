//Global
require("./bootstrap");

window.Vue = require("vue");


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// GLOABAL COMPONENTS

Vue.component('example', require('./components/ExampleComponent.vue').default);