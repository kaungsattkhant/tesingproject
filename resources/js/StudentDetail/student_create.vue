<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form v-on:submit.prevent="!editForm ? store() : update()" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label >Student_Id</label>
                        <input class="form-control input-sm" type="text" v-model="student.student_id" name="student_id">
                        <span class="text-danger" v-show="checkError">
                            {{  formError.student_id}}
                        </span>
                    </div>
                    <div class="form-group ">
                        <label >Name</label>
                        <input class="form-control input-sm" type="text" v-model="student.name" >
                        <span class="text-danger" v-show="checkError">
                            {{  formError.name}}
                        </span>

                    </div>
                    <div class="form-group ">
                        <label >Email</label>
                        <input class="form-control input-sm" type="text" v-model="student.email">
                        <span class="text-danger" v-show="checkError">
                            {{  formError.email}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label >Major:</label>
                        <select  class="form-control"  v-model="student.major_id">
                            <option disabled value="">Please select one</option>
                            <option  v-for="m in majors" :value="m.id" :selected="student.major_id == m.id">{{m.name}}</option>
                        </select>
                        <span class="text-danger" v-show="checkError">
                            {{  formError.major}}
                        </span>
                    </div>
                    <div class="form-group ">
                        <label>Password</label>
                        <input class="form-control input-sm" type="password" v-model="student.password" name="password">
                        <span class="text-danger" v-show="checkError">
                            {{  formError.password}}
                        </span>
                    </div>
                    <div class="form-group ">
<!--                        <img :src="'../image/default.png'" class="image" width="100px" height="100px">-->
                        <img v-if="url" :src="url" class="img-fluid"  width="100px" height="100px">
<!--                        <label >Photo</label>-->
                        <input  name="file" type="file"  ref="file" @change="chooseFile">
                        <span class="text-danger" v-show="checkError">
                            {{  formError.photo}}
                        </span>
                    </div>
                    <div class="form-group  ">
                        <button class="btn btn-success " v-show="!editForm">Create..</button>
                        <button class="btn btn-success " v-show="editForm">Update..</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Major</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="st in students" :key="st.id">
                        <td>{{st.name}}</td>
                        <td>{{st.major.name   }}</td>
                        <td>{{st.email}}</td>
                        <td>
                            <button  class="btn btn-primary" @click="edit(st.id)">Edit</button>
                            <button  class="btn btn-danger">Delete</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>


        </div>

    </div>
</template>
<script>
    import axios from 'axios';
    // import image from "assets/image/default.png";
    export default {
        props:{
            majors:{},
        },
        data(){
            return {
                editForm:false,

                students:[],
                url:null,
                formError:[],
                checkError:false,
                selectedMajor:'',
                student:{
                    student_id:'',
                    name:'',
                    email:'',
                    password:'',
                    photo:'',
                    major_id:'',
                },
            }
        },

        methods:{
            showData(){
                axios.get('/student/get_data').then(data=>(this.students=data.data));
            },
            toggleModal(){
                $('#myModal').modal('show');
            },
            chooseFile(e){
                // console.log('b is ' + event.target.files[0]);
                // this.photo = event.target.files[0];
                // this.student.photo=this.$refs.file.files[0];
                  this.student.photo = e.target.files[0];
                this.url = URL.createObjectURL( this.student.photo);
                // this.url = URL.createObjectURL(this.student.photo);
            },
            store(){
              // alert('aaa');
                let formData = new FormData();
                // formData.append('file',this.photo);
                formData.append('photo',this.student.photo);
                formData.append('name',this.student.name);
                formData.append('major',this.student.major_id);
                formData.append('student_id',this.student.student_id);
                formData.append('email',this.student.email);
                formData.append('password',this.student.password);
                 var vm=this;
                 // var data=this.student;
                // console.log(formData);
                 axios.post('/student/store',formData,
                     {
                         headers: {
                             // 'Content-Type': 'multipart/form-data'
                             "Content-type":"multipart/form-data, charset=utf-8; boundary=" + Math.random().toString().substr(2)
                         }
                     }
                 ).then(function (response) {
                     // console.log(response.data.errors);
                     if(response.data.is_success==false){
                         vm.checkError=true;
                         vm.formError=response.data.errors;

                     }
                     vm.showData();
                     vm.student='';
                     vm.url=null;
                 });
            },
            edit(st_id){
                this.editForm=true;
                var vm=this;
                axios.get('/student/'+st_id+'/edit').then(function (response) {
                    console.log(response.data);
                    console.log(vm);
                    vm.student=response.data;
                    // alert(response.data.major_id);
                    vm.selectedMajor=response.data.major_id;
                    // vm.url=URL.createObjectURL( response.data.photo);
                });
            },
            update(){
                console.log(this.student);
            }

        },
        created() {
            this.showData();
        },

    };
</script>
