<template>
<!--    <p>This is autocomplete</p>-->
    <div>
        <input type="text"  name="search" placeholder="Type here.." v-model="search" v-on:keyup="getSearchData" autocomplete="off" class="form-control" @focus="modal=true">
        <input type="hidden" v-model="item_id" name="item_id" >
        <div class="panel-footer" v-if="results.length && modal">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" @click="selectItem(result.id,result.name)">{{ result.name }}</li>
            </ul>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data:function(){
            // console.log(item_id);
            return{
                search:'',
                item_id:'',
                modal:false,
                results:[],
            }
        },
        // mounted() {
        //     console.log('Mount_item'+item_id);
        // },
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
            },
            selectItem(id,result){
                this.modal=false;
                this.search=result;
                this.item_id=id;
                console.log(this.item_id);
            },
        },
    }
</script>
