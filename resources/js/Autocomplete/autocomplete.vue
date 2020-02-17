<template>
<!--    <p>This is autocomplete</p>-->
    <div>
        <div class="text-danger" v-if="error">
            <strong>Error!</strong>
            <slot>Something Wrong</slot>
        </div>
        <input type="text"  name="search" placeholder="Type here.." v-model="search" v-on:keyup="getSearchData" autocomplete="off" class="form-control" @focus="modal=true">
        <button :disabled="error" @click="addItem()">Add</button>
        <input type="hidden" v-model="item_id" name="item_id" >
        <div class="panel-footer" v-if="results.length && modal">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" @click="selectItem(result.id,result.name)">{{ result.name }}</li>
            </ul>
        </div>
        <ul >
            <li v-for="(t,index) in todo_item">
                {{t.name}} <button v-on:click="todo_item.splice(index,1)">remove</button>
            </li>
        </ul>
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
                error:false,
                todo_item:[
                    {
                        'id':1,
                        'name':'mg',
                    }
                ],
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
                        if(response.data.is_success){
                            console.log(response.data.is_success);
                            this.results=response.data.items;
                            this.error=false;
                        }else{
                          this.error=true;
                        }
                    });
                }
            },
            selectItem(id,result){
                this.modal=false;
                this.search=result;
                this.item_id=id;
                // console.log(this.item_id);
            },
            addItem(){
                this.todo_item.push({
                    id:this.item_id,
                    name:this.search,
                    // this.modal=false,
                });
                this.modal=false;
                this.search='';
            },
            // isDisable:function(){
            //     return !this.error;
            // }

        },
    }
</script>
