<template>
    <div class="card_wrapper">
        <div class="card_wrapper__image">
            <img :src="movie.image" alt="" class="image__img">
        </div>
        <p>{{movie.name}}</p>
        <p>{{movie.description}}</p>
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
    },
}
</script>

<style scoped lang="less">
    .card_wrapper {
        h1 {
            color:red;
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