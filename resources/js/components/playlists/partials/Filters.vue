<template>

    <div class="filters">
        <p v-if="filtersInUse">
            <a href="#" @click.prevent="clearAllFilters">Clear all filters</a>
        </p>
        <div class="dropdown" v-for="map, key in filters">
            <h3>{{ key.toUpperCase() }}</h3>
            <button class=" ps btn dropdown-toggle" type="button" data-toggle="dropdown" >{{choosenValue(key)}}
            <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu">
                    
                    <li v-for="filter, value in map" @click.prevent="activateFilter(key,value)" ><a href="#" >{{filter}}</a> </li>

                </ul>
                <a href="#" v-if="selectedFilters[key]" @click.prevent="clearFilter(key)" > Clear this filter</a>
        </div>
    </div>
</template>

<script>
export default {
    props: [
            'endpoint'
        ],

    data () {
            return {
                filters: {},
                selectedFilters: _.omit(this.$route.query, ['page'])
            }
        },
    
    computed:{
        filtersInUse(){
            return !_.isEmpty(this.selectedFilters)
        }

    },

     mounted () {
            axios.get(this.endpoint).then((response) => {
                this.filters = response.data.data
            })
        },
     
     methods:{
         activateFilter(key,value){
            this.selectedFilters = Object.assign({}, this.selectedFilters, {[key]:value});     
            this.updateQueryString()
         },
            choosenValue(key){
              
                if(this.selectedFilters[key] === this.selectedFilters.artist){
                    return this.selectedFilters.artist;
                }else if(this.selectedFilters[key] === this.selectedFilters.genre){
                    return this.selectedFilters.genre;
                }else if(this.selectedFilters[key] === this.selectedFilters.year){
                    return this.selectedFilters.year;
                }else
                return;
            },
         clearFilter(key){
                this.selectedFilters= _.omit(this.selectedFilters, key)

                this.updateQueryString()
         },

         clearAllFilters(){
            this.selectedFilters={}
            this.updateQueryString()
         },

         updateQueryString(){
             this.$router.replace({
                        query:{
                            ...this.selectedFilters,
                            page: 1
                        }
                    })
         }

     }
    
}
</script>

<style scoped>
.ps{
    background: darkorange;
}
.ps:hover{
    background-color: red;
}
a {
  text-decoration: none;
  color: darkorange;
  font-weight: bold;
}
ul {
    background: darkorange;
    list-style: none;
    margin: 0;
    padding-left: 0;
}

li {
    color: #fff;
    background: darkorange;
    display: block;
    float: left;
    padding: 1rem;
    position: relative;
    text-decoration: none;
    transition-duration: 0.5s;
}
  
li a {
  color: #fff;
}

li:hover,
li:focus-within {
    background: red;
    cursor: pointer;
}

li:focus-within a {
  outline: none;
}

ul li ul {
    background: orange;
    visibility: hidden;
    opacity: 0;
    min-width: 5rem;
    position: absolute;
    transition: all 0.5s ease;
    margin-top: 1rem;
    left: 0;
    display: none;
}
ul li:hover > ul,
ul li:focus-within > ul,
ul li ul:hover,
ul li ul:focus {
   visibility: visible;
   opacity: 1;
   display: block;
}

ul li ul li {
    clear: both;
    width: 100%;
}
</style>