<template>
    <div>
        <h1>ban</h1>
        <jw-pagination :items="exampleItems" @changePage="onChangePage" maxPages="3"></jw-pagination>
    </div>
</template>

<script>

import JwPagination from 'jw-vue-pagination';
const exampleItems = [...Array(150).keys()].map(i => ({ id: (i+1), name: 'Item ' + (i+1) }));

export default {
    data() {
        return {
            exampleItems,
            pageOfItems: []
        }
    },
    components: [JwPagination],
    computed: {
    },
    methods: {
        onChangePage(pageOfItems) {
            console.log(pageOfItems);
            this.paginationItems = pageOfItems;
        }
    },
    created() {
        window.pag = this.paginationItems;
        console.log(this.paginationItems);
    }
}
</script>

<style scoped>

</style>