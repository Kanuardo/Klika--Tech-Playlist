<template>

     <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
               
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th @click="sort('artist')">Artist name<span class="icon i-arrow float-right"></span></th>
                        <th @click="sort('track')">Song<span class="icon i-arrow float-right"></span></th>
                        <th @click="sort('genre')">Genre<span class="icon i-arrow float-right"></span></th>
                        <th @click="sort('year')">Year<span class="icon i-arrow float-right"></span></th>
                        <th @click="sort('duration')">Duration<span class="icon i-arrow float-right"></span></th>
                        </tr>
                    </thead>
                    <template v-if="playlists.length">
                         <tbody>
                            <tr v-for="playlist in sortedPlaylist" v-bind:key="playlist.id">
                            <td>{{ playlist.artist }}</td>
                            <td>{{ playlist.track }}</td>
                            <td>{{ playlist.genre }}</td>
                            <td>{{ playlist.year }}</td>
                            <td>{{ playlist.duration }}</td>
                            </tr>
                        </tbody>
                    </template>

                    <template v-else>
                        <p> Not found</p>
                    </template>
                    
                    </table>

                <pagination :meta="meta" ></pagination>    
                 
                 <button class=" bb btn dropdown-toggle" type="button" data-toggle="dropdown">Choose songs per page <span class="caret "></span></button>
                    <ul class="dropdown-menu dropdown-menu">
                    <li><a href="#" @click.prevent="getOptionPaginate(5)">5</a> </li>
                    <li><a href="#" @click.prevent="getOptionPaginate(10)">10</a> </li>
                    <li><a href="#" @click.prevent="getOptionPaginate(20)">20</a> </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <filters endpoint="/api/playlist/filters">  </filters>
        </div>

     </div>

</template>


<script>
import Playlist from './partials/Playlist.vue'
import Filters from './partials/Filters.vue'
import Pagination from '../pagination/Pagination.vue'


export default {
    components:{
        Playlist,
        Pagination,
        Filters
    },
    data(){
        return {
            playlists: [],
            meta: {
                
            },
            currentSort:'artist',
            currentSortDir:'asc'
        }
    },
    watch:{
        '$route.query':{
            handler (query){
                this.getPlaylists(1, query)
            },
            deep:true
        }

    },

    mounted(){
        
        this.getPlaylists()

    },
    methods:{
        getPlaylists(page=this.$route.query.page, filters = this.$route.query){
            axios.get('/api/playlist', {
                params:{
                    page,
                    ...filters
                }
            }).then((response)=>{
            this.playlists = response.data.data
            this.meta = response.data.meta
            })
        },
        getOptionPaginate(per_page){
            this.$router.replace({
                        query:{
                            ...this.$route.query,
                            per_page,
                            page: 1
                        }
                    })
        },
         sort:function(s) {
                if(s === this.currentSort) {
                this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
                }
                this.currentSort = s;
            }

    },
        computed:{
        sortedPlaylist:function() {
            return this.playlists.sort((a,b) => {
                let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                return 0;
            });
        }
    }
    
}
</script>

<style lang="scss" scoped>
.icon {
    display: block;
    &.i-arrow {
        width: 24px;
        height: 24px;
        background-image: url("/icons/arrow.svg");
        background-position: center;
        background-size: contain;
    }
}
.bb{
    background: #ff8c00;

}
 a{
    color: #000000;
}
</style>