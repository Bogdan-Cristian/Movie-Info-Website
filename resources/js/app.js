require('./bootstrap');
import Vue from 'vue';
import MovieCard from "./Vue/MovieCard";
import MovieList from "./Vue/MovieList";
window.vue = require('vue');

Vue.component('movie-card', MovieCard)
Vue.component('movie-list', MovieList)


let app = new Vue( {
    el: "#app"
})
//
