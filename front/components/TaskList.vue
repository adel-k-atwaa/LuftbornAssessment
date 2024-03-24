<template>
  <div class="w-full mt-5">
    <div v-for="task in tasks" :key="task.id" class="flex mt-3 mb-3 justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent hover:bg-gray">
      <div class="inline-flex items-center space-x-2">
        <div class="mr-6 cursor-pointer" v-if="task.completed_flag" @click="taskUpdate(task)">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
              </svg>
        </div>
        <div class="mr-6 cursor-pointer" v-else @click="taskUpdate(task)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
        </div>
        <div class="text-xl" :class="task.completed_flag?'line-through':''">{{task.name}}</div>
    </div>
    <div class="flex flex-row space-x-4">
      <!-- <div>
          <EditSVG/>
      </div> -->
      <div class="cursor-pointer" @click="taskDelete(task)">
        <DeleteSVG/>
      </div>
  </div>
  </div>
</div>
</template>

<script>

export default{
  props:{
    tasks:Array,
  },
  methods:{
    taskUpdate(task){
      task.completed_flag = !task.completed_flag
      this.$emit('update',task);
    },
    taskDelete(task){
      this.$emit('delete',task);
    }
  }
}
</script>
