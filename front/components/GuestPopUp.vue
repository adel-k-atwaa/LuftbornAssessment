<template>
    <div class=" text-4xl h-screen flex items-center shadow-lg relative">
        <div @click="hidePopUp" class="h-full w-full absolute top-0 left-0 z-10"></div>
        <div class="w-96 h-54 bg-gray rounded-2xl mx-auto my-auto flex flex-col justify-start z-20">
            <div class="w-full h-1/2 p-4 bg-purple rounded-t-2xl flex items-center justify-center">
               <img class="w-60" src="~/assets/NOJOMlogoArtboard 1.png" alt="">
            </div>
            <div class=" p-4">
                <div class="w-full text-center text-xl">
                    <p>please register or sign in to continue </p>
                </div>
                <div class="w-full flex justify-center mt-4">
                    <NuxtLink  to='/Reg/registration' class="txx text-white cursor-pointer text-base text-center w-1/2 bg-purple rounded-2xl py-2 px-4">
                        Sign Up
                    </NuxtLink >
                    <NuxtLink  to='/Reg/log_in' class="txx text-white ml-6 cursor-pointer text-base text-center w-1/2 bg-purple rounded-2xl py-2 px-4">
                        Sign in
                    </NuxtLink >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    methods:{
        hidePopUp(){
            this.$emit('hide')
        }
    }
}
</script>


<style scoped>
.txx{
    transition:transform 0.2s ease-in-out;
}
.txx:hover{

    transform: translatey(-2px);
}
</style>
