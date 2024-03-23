<template>
    <div class="h-80 w-full relative mt-20">
        <div class="w-full flex justify-center absolute mt-5">
          <span class="text-6xl sm:text-7xl text-white font-extrabold">{{appName}}</span>
        </div>
        <div class="w-full flex justify-center absolute mt-32">
            <a target="_blank" class="z-20" href="#"><img class="w-10 z-20 mr-4" src="https://www.freepnglogos.com/uploads/facebook-icons/facebook-icon-transparent-background-3.png" alt=""></a>
            <a target="_blank" class="z-20" href="#"><img class="w-10 z-20 " src="https://www.freepnglogos.com/uploads/instagram-logos-png-images-free-download-5.png" alt=""></a>
        </div>

        <div class="h-full w-full top-0 left-0 absolute">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1594623930572-300a3011d9ae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
        </div>
        <div class="w-full h-4/5 absolute top-0 left-0 bg-gradient-to-t from-black to-purple z-10 opacity-80"></div>
        <div class="w-full flex justify-center items-center h-1/5 absolute bottom-0 left-0 bg-black z-10 opacity-60 border-t-1 border-gray">
            <p class="text-gray z-40">Copyright © 2024 {{appName}} . All Rights Reserved.</p>
        </div>
    </div>
</template>
<script>

export default {
  data(){
          return{
              appName: "",
              profile:{
                  email:'',
                  password:'',
              }
          }
      },
  mounted(){
    this.appName= process.env.app_name
  }
}
  </script>
