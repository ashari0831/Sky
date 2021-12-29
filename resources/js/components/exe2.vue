<template>
  
  <div>
      {{ this.instance }}
   
         
   <div v-if="index < 4">
          <h6>
              {{ products[index].name }}
          </h6>
   </div>
        <button @click="next()">nex</button>
      
    <div v-for="(pro, index) in products" :key="index">
        <h5>
            {{ pro.name }}
        </h5>
    </div>

  </div>
</template>

<script>
export default {
    data(){
        return{
            instance:34,
            index: 0
        }
    },
    props:{
        products:Array,
        
    },
    methods:{
        next(){
            this.index++
        }
    }
}
</script>

<style>

</style>