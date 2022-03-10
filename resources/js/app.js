
require('./bootstrap');
import Vue from 'vue';
import MovieCard from "./Vue/MovieCard";
import MovieList from "./Vue/MovieList";
import FilterBar from "./Vue/FilterBar";
import Pagination from "./Vue/Pagination";
import JwPagination from "jw-vue-pagination";
import ImportedPagination from "./Vue/ImportedPagination";

window.vue = require('vue');

Vue.component('movie-card', MovieCard)
Vue.component('movie-list', MovieList)
Vue.component('filter-bar', FilterBar)
Vue.component('pagination', Pagination)
Vue.component('imported-pagination', ImportedPagination)
Vue.component('jw-pagination', JwPagination)


let app = new Vue( {
    el: "#app"
})
//
