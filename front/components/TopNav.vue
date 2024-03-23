<template>
    <!-- <div> -->
        <div class="w-full h-24 flex justify-between z-30 fixed">
            <div class="w-full h-full bg-gradient-to-b from-purple absolute opacity-80"></div>
            <!-- logo -->
            <!-- text-white text-4xl sm:text-7xl text-center sm:text-left font-extrabold -->
            <NuxtLink to='/' class="absolute top-2 left-2 sm:top-4 sm:left-24 z-500 h-12 z-30 sm:h-10  text-white text-xl sm:text-4xl text-center sm:text-left font-extrabold">
                {{ appName }}
            </NuxtLink>
            <div v-if="name" class="absolute h-16 sm:h-10 w-1/2 sm:w-1/4 z-30 top-2 sm:top-4 right-4 sm:right-10 flex justify-end items-center">
                <NuxtLink  to='#' class="h-12 sm:h-10 w-12 sm:w-10 rounded-full border-2 border-yellow flex">
                    <img class="w-12 h-full object-cover rounded-full" :src="defaultUserImg" alt="">
                </NuxtLink >
                <div class="w-1/2 text-left ml-4 hidden sm:inline">
                    <p class="text-white ">Welcome</p>
                    <p class="text-yellow capitalize">{{name}}</p>
                </div>
                <div @click="logingOut" class="text-white underline cursor-pointer">Log out</div>
            </div>
            <div v-if="!name" class="absolute h-16 sm:h-12 w-1/2 sm:w-1/4 z-30 top-4 sm:top-5 right-2 sm:right-10 flex justify-end">
                <NuxtLink  to='/' class="text-white ml-6 cursor-pointer hover:text-purple">
                    Sign in
                </NuxtLink >
            </div>
        </div>
</template>

<script>

export default{
    props:{
        Slider:Array,
    },
    data(){
        return{
          appName:"",
          screenWidth:window.screen.width,
          name:sessionStorage.getItem('name'),
          img:sessionStorage.getItem('img'),
          defaultUserImg:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDPv1yj_NPcC5rtnynX4YY_EBnDqVoYlCv6NT_sqUjit93iOYaPO5PEs7xja85-xckWEI&usqp=CAU',
       }
    },
    beforeMount() {
      this.appName=process.env.app_name;
    },
    methods:{
        logingOut(){
            this.$emit('endUser')
        },
    }

}
</script>
