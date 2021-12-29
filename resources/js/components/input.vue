<template>
  <div>
      <input type="text" v-model="category">
      <input type="text" v-model="name">
      <input type="text" v-model="description">
      <input type="text" v-model="gallery">
      <input type="number" v-model="price">
      <input type="number" v-model="quantity">
      <button @click="savePro()">sub</button>
  </div>
</template>

<script>
export default {
    data(){
        return{
            category:'',
            name:'',
            description:'',
            gallery:'',
            price:0,
            quantity:0
        }
    },
    methods:{
        savePro(){
            axios.post('/api/product', {
                category: this.category,
                name:this.name,
                description: this.description,
                gallery: this.gallery,
                price: this.price,
                quantity: this.quantity
            })
                .then((res) => {
                    if(res.status == 201){
                        this.category = '',
                        this.name = '',
                        this.description = '',
                        this.gallery = '',
                        this.price = 0,
                        this.quantity = 0,
                        this.$emit('productcreated')
                    }
                });
        }
    }
}
</script>

<style>

</style>