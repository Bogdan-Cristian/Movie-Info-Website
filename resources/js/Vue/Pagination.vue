<template>
    <div class="pagination_wrapper">
        <div class="pagination_wrapper__page_box" @click="selectPage(1)">
            <p class="page_box__text">1</p>
        </div>

        <div class="pagination_wrapper__page_box" @click="selectPage(2)">
            <p class="page_box__text">2</p>
        </div>

        <div class="pagination_wrapper__page_box" @click="selectPage(3)">
            <p class="page_box__text">3</p>
        </div>

        <div class="pagination_wrapper__page_box" @click="selectPage(4)">
            <p class="page_box__text">4</p>
        </div>

        <div class="pagination_wrapper__page_box" @click="selectPage(5)">
            <p class="page_box__text">5</p>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'pagination',
        methods: {
            selectPage(pageNumber) {
                let url = window.location.href;

                let separator = url.includes('?') ? '&' : '?';

                window.location.href += separator + 'page=' + pageNumber;
            }
        }

    }
</script>

<style lang="less" scoped>
    @bg-color: #303088;
    @text-color: white;

    .pagination_wrapper {
        display: flex;

        .pagination_wrapper__page_box {
            padding: 11px;
            background-color: @bg-color;
            border-radius: 6px;
            margin-left: 20px;
            cursor: pointer;

            &:first-child {
                margin-left: 0;
            }

            .page_box__text {
                color: @text-color;
                padding: 0;
                margin: 0;
                line-height: 8px;
            }
        }
    }

</style>