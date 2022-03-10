<template>
    <div class="filter_bar_wrapper">
        <div class="wrapper__box" @click="filterContent('popularity')">
            <p class="box__text">Popularity</p>
        </div>

        <div class="wrapper__box" @click="filterContent('releaseDate')">
            <p class="box__text">Release Date</p>
        </div>

        <div class="wrapper__box" @click="filterContent()">
            <p class="box__text">DESC</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "filter-bar",
    methods: {
        filterContent(sortName) {
            let url = new URL(window.location.href);
            switch (sortName) {
                case 'popularity':
                    url.searchParams.set('sort_by','popularity.desc')
                    break;
                case 'releaseDate':
                    url.searchParams.set('sort_by','release_date.desc')
                    break;
            }

            window.location.href = url;
        }
    },
}
</script>

<style lang="less" scoped>
    @bg-color: #303088;
    @text-color: white;

    .filter_bar_wrapper {
        display: flex;
        padding:10px 0;

        .wrapper__box {
            background-color: @bg-color;
            color:@text-color;
            font-size: 12px;
            border-radius: 12px;
            padding: 5px 7px;
            margin-left: 20px;
            cursor: pointer;

            &:first-child {
                margin-left: 0;
            }

            .box__text {
                padding: 0;
                margin: 0;
            }
        }

    }
</style>