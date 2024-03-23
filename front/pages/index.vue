<template>
  <div class="relative">
          <div class=" w-screen h-screen relative overflow-x-hidden">
              <div class="w-full h-full bg-gradient-to-t from-purple absolute opacity-70 z-10"></div>
              <img class="absolute w-full h-full top-0 left-0 object-cover" src="https://images.pexels.com/photos/3469692/pexels-photo-3469692.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
              <div class="absolute z-20 top-28 left-8 sm:left-1/2 flex">
                  <div class="mr-96 page">
                      <p class="text-6xl sm:text-7xl text-white font-extrabold">Sign-in to</p>
                      <NuxtLink to='/' class=" z-30 h-20 w-32">
                        <p class="text-6xl sm:text-7xl text-white font-extrabold" v-html="to"></p>
                      </NuxtLink>
                      <div class="flex flex-col mt-8 items-center sm:items-center">
                          <input v-model="profile.email" class="h-12 w-72 sm:w-96 mb-6 p-2 text-white rounded-3xl outline-none border-none border-gray focus:outline focus:border-none focus:outline-red-600 focus:ring-0 text-lg bg-black opacity-90" placeholder="Email" type="text">
                          <input v-model="profile.password" class="h-12 w-72 sm:w-96 mb-2 p-2 tblack rounded-3xl outline-none border-none border-gray focus:outline focus:border-none focus:outline-red-600 focus:ring-0 text-lg bg-black opacity-90" placeholder="Password" type="Password">
                          <div class="flex justify-between w-72 sm:w-96">
                              <label class="w-1/2 sm:w-auto text-sm text-white" for="remember"><input class="mr-2" type="checkbox">remember me for</label>
                          </div>
                      </div>
                      <div class="flex mt-10">
                          <button class=" w-72 sm:w-64 h-12 flex justify-center items-center rounded-3xl mr-3 bg-purple text-white text-2xl font-semibold p-2 transition hover:translate-x-1 duration-150 ease-in-out" @click="login">Login</button>
                      </div>
                  </div>

              </div>
          </div>

  </div>
  </template>
  <script>
  import axios from 'axios'

  export default {
      data(){
          return{
              to: "Task Manager",
              profile:{
                  email:'',
                  password:'',
              }
          }
      },
      methods:{
          async login(){
              const formData = new URLSearchParams()
              formData.append("email",this.profile.email)
              formData.append("password",this.profile.password)
              let user_name=this.profile.username
              await axios.post(`${process.env.base_url}login`,formData,
              {headers: {'content-type': 'application/x-www-form-urlencoded'}})
              .then((res)=>{
                  if(res.status == 200){
                      sessionStorage.setItem('access_token', res.data.access_token)
                      sessionStorage.setItem('name', res.data.name)
                      sessionStorage.setItem('expires_at', res.data.name)
                      this.$router.push('/Task')
                  }else{
                      // login failed

                  }
              }).catch(e=>{

              });
          },
      }
  }
  </script>
