<template>
    <div class="pagination">
        <h1 class="pagination__button" @click="togglePageList()">
            <svg class="button__icon" v-bind:class="(displayPageList)? 'close' : ''" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                 viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
<path id="XMLID_225_"
      d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393  c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393  s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"/>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
</svg>
            <span>Page: {{ actualPage }} </span>

        </h1>

        <div class="pagination_wrapper" v-if="displayPageList">
            <div class="pagination_wrapper__page_box" v-bind:class="(page.active)? 'active' : ''"
                 @click="selectPage(page.page)" v-for="page in pages">
                <p class="page_box__text">{{ page.page }}</p>
            </div>
        </div>
    </div>
</template>

<script>
const url = new URL(window.location.href);
export default {
    name: 'pagination',
    data() {
        return {
            actualPage: url.searchParams.get('page') ? parseInt(url.searchParams.get('page')) :  1,
            pages: [],
            displayPageList: false,
        }
    },
    methods: {
        selectPage(pageNumber) {
            url.searchParams.set('page', pageNumber);
            window.location.href = url.href;
        },
        togglePageList() {
            this.displayPageList = !this.displayPageList;
        },
        /**
         * Generate pages form 1 to 7 if actual page under 4
         * otherwise generate the pages 3 before and 3 after the actual page
         */
        generatePageList() {
            if (this.actualPage < 4) {
                for (let i = 1; i <= 7; i++) {
                    this.pages.push({
                        page: i,
                        active: i === this.actualPage
                    })
                }
            } else {
                this.pages = [];

                for (let i = this.actualPage - 3; i <= this.actualPage + 3; i++) {
                    this.pages.push({
                        page: i,
                        active: this.actualPage === i
                    })
                }
            }
        }
    },
    props: {
        total_pages: {
            required: false
        }
    },
    computed: {
        activePage() {

        },
        counter() {
            return this.$store.state.count;
        }
    },
    created() {
        this.generatePageList();
    }

}
</script>

<style lang="less" scoped>
@bg-color: #303088;
@text-color: white;

.pagination {
    position: fixed;
    top: 0;
    right: 0;

    // Toggle-Button
    .pagination__button {
        padding: 5px;
        background-color: @bg-color;
        color: white;
        margin-bottom: 10px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100px;
        // Icon
        .button__icon {
            max-height: 20px;
            transition: .3s;

            &.close {
                transform: rotate(180deg);
            }
        }
    }

    // Pagination Buttons List
    .pagination_wrapper {

        .pagination_wrapper__page_box {
            padding: 11px;
            background-color: @bg-color;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 10px;

            &.active {
                background-color: red;
            }

            .page_box__text {
                color: @text-color;
                padding: 0;
                margin: 0;
                line-height: 8px;
            }
        }
    }
}

</style>