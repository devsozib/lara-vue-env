<template>
    <div>
        <div class="row">
            <div class="col-md-6 m-auto">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registration</h5>
                    <form @submit.prevent="register">
                    <div class="form-group pt-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" v-model="form.name" id="name" name="name" placeholder="name">
                    </div>

                    <div class="form-group pt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" v-model="form.email" id="email" name="email" placeholder="email">
                    </div>

                    <div class="form-group pt-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" v-model="form.password" id="password" name="password" placeholder="password">
                    </div>

                    <div class="form-group pt-3">
                        <label for="password">Confirm Password:</label>
                        <input type="password" class="form-control" v-model="form.password_confirmation" id="c_password" name="c_password" placeholder="c_password">
                    </div>

                    <div class="form-group pt-3">
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
        </div>

    </div>
</template>

<script setup lang="ts">
import axios from 'axios';
import { reactive } from 'vue'
     let form = reactive({
        name:'',
        email:'',
        password:'',
        password_confirmation:'',
     });

     const register = async()=>{
           const response = await axios.post('/api/v1/auth/register',form)
           .then((res)=>{
            console.log(res.data);
                localStorage.setItem('token',res.data.data.token);
                localStorage.setItem('username',res.data.data.name);
           }).catch((err)=>{
              console.log(err.data);
           })
     }


</script>

<style>

</style>
