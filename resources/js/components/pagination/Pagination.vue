<template>
    <nav>
        <ul class="pagination">
            <li :class="{ 'disabled': meta.current_page === 1 }" class="page-item">
                <a class="page-link" href="#" @click.prevent="switched(meta.current_page - 1)">
                    <span>&laquo;</span>
                </a>
            </li>
            <li :class="{'active':meta.current_page === x}" class="page-item" v-for="x in meta.last_page" >
                <a  class="page-link" href="#" @click.prevent="switched(x)">{{ x }}</a></li>
             <li :class="{ 'disabled': meta.current_page === meta.last_page }" class="page-item">
                <a  class="page-link" href="#" @click.prevent="switched(meta.current_page + 1)">
                    <span>&raquo;</span>
                </a>
            </li>
        </ul>

    </nav>
    
</template>

<script>
export default {
    props:[
        'meta'
    ],
    methods: {
            switched (page) {
                if (this.pageIsOutOfBounds(page)) {
                    return;
                }

                this.$emit('pagination:switched', page)

                this.$router.replace({
                    query:Object.assign({}, this.$route.query, {page})
                })
            },
            pageIsOutOfBounds (page) {
                return page <= 0 || page > this.meta.last_page
            }
        }
    
}
</script>
<style scoped>
.pagination a {
  border: 1px solid #ff8c00;
}
.page-item.active .page-link{
    background-color:#ff8c00;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #ff8c00;
    border-color: #ff8c00;
}
.page-link{
    color: #000000;
}
</style>