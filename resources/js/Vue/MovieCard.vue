<template>
    <div class="card_wrapper">
        <div class="card_wrapper__image">
            <img :src="movie.poster_path" alt="" class="image__img">
        </div>

        <div class="card_wrapper__text">
            <p class="text__title">{{movie.original_title}}</p>
            <p class="text__rate">{{movie.vote_average}}</p>
        </div>

    </div>
</template>

<script>
export default {
    data: () => {
      return {
          name: 'banane'
      }
    },
    props: {
        movie: {
            type: Object,
            required: true,
        }
    }
}
</script>

<style scoped lang="less">
    .card_wrapper {
        background-color: #296a99;

        h1 {
            color:red;
        }

        .card_wrapper__text {
            padding: 10px 7px;
            position:relative;

            .text__title {
                margin-bottom: 5px;
                padding-right: 20px;
            }

            .text__rate {
                color: #ffdf35;
                background-color:#a18a00;
                position: absolute;
                padding: 5px 7px;
                border-radius: 11px;
                top:5px;
                right: 5px;
                font-weight: bold;
            }
        }

        .card_wrapper__image {
            width: 100%;

            .image__img {
                width: 100%;
                height: auto;
            }
        }
    }
</style>