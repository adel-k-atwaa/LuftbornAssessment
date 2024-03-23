<template>
    <div class="pt-10 top-0 w-full">
        <!-- <div class="my-8">
            <h2 class="font-thin text-3xl text-left text-purple"><span class="font-bold">followed</span> challenges</h2>
            <div v-if="!followedChallenges == ''" class="flex justify-start flex-wrap mx-2">
                <div v-for="fchallenge in followedChallenges" :key="fchallenge.id">
                    <p class="mt-4 mr-2 rounded-3xl py-2 px-6 bg-white text-xs shadow-md">#{{fchallenge.name}}</p>
                </div>
            </div>
            <NuxtLink  v-if="followedChallenges == ''" to='/Challenge' class="h-10 w-48 rounded-lg relative bg-purple-900">
                <div class="w-full h-full z-10 bg-gradient-to-t from-purple-900 absolute opacity-70 rounded-lg"></div>
                <p class="mt-4 mr-2 rounded-3xl py-2 px-6 bg-white text-xs shadow-md">Find challenge</p>
                <img class="w-full h-full absolute object-cover top-0 left-0 rounded-lg" src="https://api.time.com/wp-content/uploads/2019/09/karaoke-mic.jpg?quality=85&w=800" alt="">
            </NuxtLink >
        </div> -->
        <div v-if="id" class="">
            <h2 class="font-thin text-3xl text-left text-purple sticky"><span class="font-bold">Followed</span> Talents</h2>
            <div class="flex justify-start flex-wrap mx-2">
                <div v-for="ftalent in followedTalents" :key="ftalent.id">
                    <NuxtLink :to="'Talents/' + ftalent.id" >
                    <p class="mt-4 mr-2 rounded-xl py-2 px-4 bg-white text-xs shadow-md hover:shadow-lg duration-300 ease-in-out">#{{ftalent.firstName}} {{ftalent.secondName}}</p>
                    </NuxtLink>
                </div>

            </div>
        </div>
        <div v-if="blocked.length > 1 && id" class="mt-4">
            <h2 class="font-thin text-3xl text-left text-purple sticky mb-4"><span class="font-bold">Blocked</span> Users</h2>
            <div class="flex justify-start flex-wrap mx-2 w-full">
                <p v-if="blocked.length < 1" class="mb-2 mr-2 w-full h-10 flex items-center justify-between rounded-xl py-2 px-4 bg-white text-xs shadow-md hover:shadow-lg duration-300 ease-in-out">
                    No Blocked Users
                </p>
                <div v-for="item in blocked" :key="item.id" class="w-full">
                    <!-- <NuxtLink :to="'Talents/' + ftalent.id" > -->
                    <div class="">
                        <p class="mb-2 mr-2 w-full h-10 flex items-center justify-between rounded-xl py-2 px-4 bg-white text-xs shadow-md hover:shadow-lg duration-300 ease-in-out">
                            #{{item.firstName}} {{item.secondName}}
                            <span @click="unblockUser(item.id)" class="text-red cursor-pointer txx">unblock</span>
                        </p>

                    </div>
                    <!-- </NuxtLink> -->
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    components:{
        // NuxtLink ,
    },
    props:{
        // followedChallenges:{
        //     type:Array,
        //     default:[]
        // },
        followedTalents:{
            type:Array,
            default:[]
        },
        blocked:{
            type:Array,
            default:[]
        },
    },
    data(){
        return{
            token:sessionStorage.getItem("access_token"),
            id:sessionStorage.getItem("id"),
        }
    },
    methods:{
        async unblockUser(id){
// http://20.121.78.1611:8060/services/user/api/user-profiles/v1/unblock/3803
        await axios.delete(`http://${process.env.gatewayBaseURL}/services/user/api/user-profiles/v1/unblock/${id}`,{
          headers: {
              'Authorization': 'Bearer '+this.token
          }
      })
      .then( (res) =>{
          // console.log("before: " + this.Genres);
          // this.content = res.data.result[0].contents;
          console.log(res);
          console.log('unblocked user');
          // this.userPLaylists = res.data.result
          // console.log('report have been sended');
          this.$emit('updateUser')
      }).catch(e=>{
          console.log("catch error")
          console.log(e)
      });
    }
    }
}
</script>

<style scoped>
.txx{
    transition:transform 0.2s ease-in-out;
}
.txx:hover{

    transform: translatex(2px);
}
</style>

