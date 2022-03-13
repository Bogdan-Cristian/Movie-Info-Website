<template>
    <div class="list_wrapper">
        <div class="list_wrapper__movie_wrapper" v-for="movie in this.prepareMoviesData">
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
    props: ['movies'],
    computed: {
        prepareMoviesData: function () {
            return JSON.parse(this.movies);
        },
    },
    created() {
        console.log(this.prepareMoviesData);
    },
    components: {MovieCard}
}
</script>

<style lang="less" scoped>
    .list_wrapper {
        display: flex;
        flex-wrap: wrap;

        .list_wrapper__movie_wrapper {
            flex-basis: calc(100% / 5);
            padding: 7px 5px;
            margin-bottom: 20px;
        }
    }

</style>