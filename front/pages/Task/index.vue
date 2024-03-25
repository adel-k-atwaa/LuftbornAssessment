
<template>
    <div class=" back relative w-full">
        <TopNav @endUser="logOut()"/>
        <!-- ------------------------------------------------------------------------------- -->
        <!-- under nav -->
        <div class="flex justify-between left-0 w-full relative">
            <!-- hero section -->
            <div class="flex flex-col mt-16 sm:mt-20 w-full sm:w-5/6">
              <div class="w-full">
                  <div class="flex flex-row">
                    <p class="text-purple font-thin text-5xl sm:text-6xl text-center sm:text-left sm:ml-6 mt-8"><span class=" font-bold text-5xl sm:text-6xl mr-1">Tasks</span></p>
                    <div class="mt-auto ml-6 cursor-pointer">
                      <EditSVG/>
                    </div>

                  </div>
              </div>
              <div class="flex overflow-x-auto mt-2 ml-6 min-h-screen">
                  <TaskList :tasks="tasks"
                    @update="updateTask"
                    @delete="deleteTask"
                  />
              </div>
            </div>
        </div>
        <div class="w-full">
            <Footer/>
        </div>
    </div>
</template>
<script>
import { useUserStore } from '@/store/userStore'
export default {
    // middleware: 'guest',
    async setup() {
        const app = useNuxtApp()
        const userStore = useUserStore()
        let token = userStore.getAccessToken
        let config= useRuntimeConfig()
        let response = await app.$api.get(`${config.public.BASE_URL}task`,{
            headers: {
                'Authorization': 'Bearer '+ token
            }
        }).catch(e=>{
            console.log(e)
            console.log(token)
        })
        const { next_page_url: nextPage, prev_page_url: previousPage, data: tasks } = response.data;
        return {
            nextPage: nextPage,
            userStore:userStore,
            previousPage:previousPage,
            data:tasks,
            config:config,
            token:token,
        }
    },
    beforeMount(){
        this.tasks = this.data
    },
    data(){
        return{
            tasks:[],
            defaultUserImg:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDPv1yj_NPcC5rtnynX4YY_EBnDqVoYlCv6NT_sqUjit93iOYaPO5PEs7xja85-xckWEI&usqp=CAU',
        }
    },
    methods:{
        async logOut(){
            await this.$api.get(`${this.config.public.BASE_URL}logout`,{
                headers: {
                    'Authorization': 'Bearer '+this.token
                }
            })
            .then( (res) =>{
              this.userStore.delete
              this.$router.push('/')
            })
        },
        async getTasks(){
          await this.$api.get(`${this.config.public.BASE_URL}task`,{
              headers: {
                  'Authorization': 'Bearer '+this.token
              }
          })
          .then( (res) =>{
            this.tasks = res.data.data;
            this.nextPage = res.data.next_page_url
            this.previousPage = res.data.prev_page_url
          }).catch(e=>{

          });
        },
        async updateTask(task){
          await this.$api.put(`${this.config.public.BASE_URL}task/${task.id}`,task,{
              headers: {
                  'Authorization': 'Bearer '+this.token
              }
          })
          .then( (res) =>{
            this.tasks = this.tasks.filter(element=>{
                if(element.id == task.id){
                    element = task
                }
                return true;
            })
          }).catch(e=>{

          });
        },
        async deleteTask(task){
          await this.$api.delete(`${this.config.public.BASE_URL}task/${task.id}`,{
              headers: {
                  'Authorization': 'Bearer '+this.token
              }
          })
          .then( (res) =>{
            this.tasks = this.tasks.filter(element=>element.id != task.id)
          }).catch(e=>{

          });
        },
    }
}
</script>

<style scoped>
.trr{
    transition:transform 0.2s ease-in-out;
}
.trr:hover{

    transform: translatey(-7px);
}
.txx{
    transition:transform 0.2s ease-in-out;
}
.txx:hover{

    transform: translatex(7px);
}
.navbar{
     height: 95vh;
    }
    @media(max-width: 640px){
        .navbar{
        height: 80vh;
        width: 100%;
    }
    }
    .search_input{
        width: 40%;
    }
    .back{
        background-color: #FAFAFA;
    }
    .red, .red *{
        outline: 1px solid red;
    }
</style>


