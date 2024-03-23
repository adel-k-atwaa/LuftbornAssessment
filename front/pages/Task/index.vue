
<template>
    <div :style='`width:${screenWidth}`' class=" back relative">
        <TopNav @endUser="logOut()"/>
        <!-- ------------------------------------------------------------------------------- -->
        <!-- under nav -->
        <div class="flex justify-between left-0 w-full relative">
            <!-- hero section -->
            <div class="flex flex-col mt-16 sm:mt-20 w-full sm:w-4/6">
              <div class="w-full">
                  <p class="text-purple font-thin text-5xl sm:text-6xl text-center sm:text-left mr-auto sm:ml-6 mt-8"><span class=" font-bold text-5xl sm:text-6xl mr-1">Tasks</span></p>
              </div>
              <div class="flex overflow-x-auto mt-2 ml-6 h-80 hover:translate-x-10 transition duration-300 ease-in-out">
                  <TaskList :tasks="tasks"
                    @update="updateTask"
                    @delete="deleteTask"
                  />
              </div>

            </div>
        </div>
        <div :style='`width:${screenWidth}`' class="mt-2 sm:mt-28">
            <Footer/>
        </div>
    </div>
</template>



<script>
import axios from 'axios'
export default {
    // middleware: 'guest',
    data(){
        return{
            tasks:[],
            screenWidth:window.screen.width,
            id:sessionStorage.getItem('id'),
            name:sessionStorage.getItem('name'),
            img:sessionStorage.getItem('img'),
            defaultUserImg:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDPv1yj_NPcC5rtnynX4YY_EBnDqVoYlCv6NT_sqUjit93iOYaPO5PEs7xja85-xckWEI&usqp=CAU',
            token:sessionStorage.getItem("access_token"),
            expires:sessionStorage.getItem('expires_at'),
        }
    },
    beforeMount() {
        this.getTasks()
    },
    methods:{
        async logOut(){
            await axios.get(`${process.env.base_url}logout`,{
                headers: {
                    'Authorization': 'Bearer '+this.token
                }
            })
            .then( (res) =>{
              sessionStorage.clear()
              this.$router.push('/')
            })
        },
        async getTasks(){
          await axios.get(`${process.env.base_url}task`,{
              headers: {
                  'Authorization': 'Bearer '+this.token
              }
          })
          .then( (res) =>{
            console.log(res.data.data);
            this.tasks = res.data.data;
          }).catch(e=>{

          });
        },
        async updateTask(task){
          await axios.put(`${process.env.base_url}task/${task.id}`,task,{
              headers: {
                  'Authorization': 'Bearer '+this.token
              }
          })
          .then( (res) =>{
           this.getTasks()
          }).catch(e=>{

          });
        },
        async deleteTask(task){
          await axios.delete(`${process.env.base_url}task/${task.id}`,{
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


