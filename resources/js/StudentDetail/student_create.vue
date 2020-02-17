<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form v-on:submit.prevent="!editForm ? store() : update()" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="inputPassword6">Student_Id</label>
                        <input class="form-control input-sm" type="text" v-model="student.student_id" name="student_id">

                    </div>
                    <div class="form-group ">
                        <label for="inputPassword6">Name</label>
                        <input class="form-control input-sm" type="text" v-model="student.name" >

                    </div>
                    <div class="form-group ">
                        <label for="inputPassword6">Email</label>
                        <input class="form-control input-sm" type="text" v-model="student.email">

                    </div>
                    <div class="form-group" >
                        <label >Major:</label>

                        <select title="Pick a number" class="form-control"  v-model="student.major" >
                            <option  v-for="m in majors" :value="m.id">{{m.name}}</option>

                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="inputPassword6">Password</label>
                        <input class="form-control input-sm" type="text" v-model="student.password" name="password">
                    </div>
                    <div class="form-group ">
                        <label for="inputPassword6">Photo</label>
                        <input class="form-control input-sm" type="file"  ref="file" @change="chooseFile()">
                    </div>
                    <div class="form-group  ">
                        <button class="btn btn-success  "  type="submit"  @click="store" v-show="!editForm">Create..</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="submit" class="btn btn-danger">Edit</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>


        </div>

    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        props:['majors'],
        data(){
            return {
                editForm:false,

                students:[],
                student:{
                    student_id:'',
                    name:'',
                    email:'',
                    password:'',
                    photo:'',
                    major:'',
                },
            }
        },
        methods:{
            toggleModal(){
                $('#myModal').modal('show');
            },
            chooseFile(event){
                // console.log('b is ' + event.target.files[0]);
                // this.photo = event.target.files[0];
                this.student.photo=this.$refs.file.files[0];
            },
            store(){
              // alert('aaa');
                let formData = new FormData();
                // formData.append('file',this.photo);
                formData.append('photo',this.student.photo);
                formData.append('name',this.student.name);
                formData.append('student_id',this.student.student_id);
                formData.append('email',this.student.email);
                formData.append('password',this.student.password);
                 var vm=this;
                 // var data=this.student;
                 // console.log(data);
                 axios.post('/student/store',formData,
                     {
                         headers: {
                             // 'Content-Type': 'multipart/form-data'
                             "Content-type":"multipart/form-data, charset=utf-8; boundary=" + Math.random().toString().substr(2)
                         }
                     }
                 ).then(function (response) {
                     console.log(response.data);
                 });

            }

        },
        mounted() {
            console.log('mounted');
        }
    }
</script>
