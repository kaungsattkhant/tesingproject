<template>
<!--    <p>This is autocomplete</p>-->
    <div>
        <input type="text" placeholder="Type here.." v-model="search" v-on:keyup="getSearchData" class="form-control">
        <div class="panel-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">{{ result.name }}</li>
            </ul>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data:function(){
            return{
                search:'',
                results:[],
            }

        },
        methods:{
            getSearchData(){
                this.results=[];
                if(this.search.length>0){
                    axios.get(
                        '/autocomplete/search',
                        {
                                    params: {
                                        search:this.search
                                    }
                               }
                    ).then(response=>{
                       // console.log(response);
                        this.results=response.data;
                    });
                }
            }
        },
    }
</script>
