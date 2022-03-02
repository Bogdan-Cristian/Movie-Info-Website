require('./bootstrap');
import Vue from 'vue';
import MovieCard from "./Vue/MovieCard";
import MovieList from "./Vue/MovieList";
import FilterBar from "./Vue/FilterBar";
import Pagination from "./Vue/Pagination";
window.vue = require('vue');

Vue.component('movie-card', MovieCard)
Vue.component('movie-list', MovieList)
Vue.component('filter-bar', FilterBar)
Vue.component('pagination', Pagination)


let app = new Vue( {
    el: "#app"
})
//
