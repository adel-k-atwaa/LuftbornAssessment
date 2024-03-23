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
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
            <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z"></path>
            </svg>
      </div> -->
      <div class="cursor-pointer" @click="taskDelete(task)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
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
