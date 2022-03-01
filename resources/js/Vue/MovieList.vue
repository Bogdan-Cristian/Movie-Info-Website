<template>
    <div class="list_wrapper">
        <div class="list_wrapper__movie_wrapper" v-for="movie in movies">
            <movie-card :movie="movie"></movie-card>
        </div>
    </div>
</template>

<script>
import MovieCard from "./MovieCard";
import movieApi from "../includes/movieApi";
export default {
    data() {
        return {

        }
    },
    created() {
        this.movies = movieApi.getMovies()
    },
    components: {MovieCard}
}
</script>

<style lang="less" scoped>
    .list_wrapper {
        display: flex;
        flex-wrap: wrap;

        .list_wrapper__movie_wrapper {
            flex-basis: calc(100% / 3);
            padding: 7px 5px;
            border:1px solid red;
        }
    }

</style>