<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

<!--        <div v-if="error" class="error">-->
<!--            {{ error }}-->
<!--        </div>-->
<!--        <ul v-if="users">-->
<!--            <li v-for="user in users">-->
<!--                <strong>Name:</strong> {{ user.name }},-->
<!--                <strong>Email:</strong> {{ user.email }}-->
<!--            </li>-->
<!--        </ul>-->
        <div class="table">
            <table class="table-responsive">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                  </tr>
                </thead>
                <tbody >
                <tr v-if="error" class="error" >
                    <p>{{error}} <button @click.prevent="fetchData">
                        Try Again
                    </button></p>
                </tr>
                <tr v-for="{name,email} in users " >
                    <td></td>
                    <td>{{name}}</td>
                    <td>{{email}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                users: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods:{
            fetchData(){
                this.error = this.users = null;
                this.loading = true;
                axios.get('api/users').then(response=>{
                    console.log(response.data);
                    this.loading = false;
                    this.users = response.data;
                }).catch(error=>{
                    this.loading = false;
                   this.error=error.response.data.message || error.message;
                });
            },
        }
    }
</script>
