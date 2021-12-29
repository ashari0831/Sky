<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                       <Exe2 :products="products" />
                       <Input v-on:productcreated="show()"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Exe2 from './exe2.vue'
import Input from './input.vue'
    export default {

        components: {
            Exe2,
            Input
        },
        data(){
            return{
                products: [],
                index: 0,
                id: 4
                
            }
        },
        methods:{
            show(){
                axios.get('/api/product')
                    .then(res => {
                        this.products = res.data
                    })
            }
        },

        mounted() {
            // fetch('/api/product', {
            //     method: 'get'
            // })
            //     .then(response => {
            //         return response.json()
            //         //console.log(response.json())
            //     })
            //     .then(data => {
            //         this.products = data
            //     })
            //     .catch( err => {
            //         console.log(err)
            //     })

                axios.get('/api/product')
                    .then(res => {
                        this.products = res.data
                    })
                
        }
    }
</script>
