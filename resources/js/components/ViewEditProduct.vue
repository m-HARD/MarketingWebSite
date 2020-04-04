<template>
     <div id="app">
        <div class="mx-20 flex justify-center">
            <div class="mb-3 bg-gray-300 rounded-lg overflow-hidden w-2/3">
                <div class="py-1 px-5 underline"><a href="../product">Go Back</a></div>
                <div class="py-4 text-center">IMG</div>
                <div class="py-1 px-5">
                    <span class="font-bold">ID : </span>
                    {{ product.id }}
                </div>
                <div class="py-1 px-5">
                    <span class="font-bold">Name : </span>
                    <span v-if="editing == false"> {{ product.name }}</span>
                    <span v-else>
                        <input type="text" name="name" id="name" v-model="product.name" class="myinput focus:outline-none focus:shadow-outline">
                    </span>
                </div>
                <div class="py-1 px-5 flex flex-wrap">
                    <span class="font-bold mr-1">Description : </span>
                    <span v-if="editing == false"> {{ product.description }}</span>
                    <span v-else>
                        <textarea name="description" id="description" cols="82" rows="3" v-model="product.description"
                        class="myinput focus:outline-none focus:shadow-outline"></textarea>
                    </span>
                </div>
                <div class="py-1 px-5">
                    <span class="font-bold">Price : </span>
                    <span v-if="editing == false">{{ product.price | currency }}</span>
                    <span v-else>
                        <input type="number" name="price" id="price" v-model="product.price" class="myinput focus:outline-none focus:shadow-outline">
                    </span>
                </div>
                <div class="py-1 px-5">
                    <span class="font-bold">In Stock : </span>
                    <span v-if="editing == false">{{ product.inStock }}</span>
                    <span v-else>
                        <input type="number" name="inStock" id="inStock" v-model="product.inStock" class="myinput focus:outline-none focus:shadow-outline">
                    </span>
                </div>
                <div class="py-1 px-5">
                    <span class="font-bold">last purchase : </span>
                    {{ product.updated_at == product.created_at ? "No purchase yet" : lastPurchase() }}
                </div>

                <div class="pb-4 px-5 text-right">
                    <div v-if="editing == false">
                        <span class="px-3 py-2 bg-green-600 hover:bg-green-800 rounded-md text-gray-300 cursor-pointer" @click="editing = !editing">Edit</span>
                        <a href="#" class="px-3 py-2 bg-red-600 hover:bg-red-800 rounded-md text-gray-300">Delete</a>

                    </div>
                    <div v-else>
                        <span class="px-3 py-2 bg-green-600 hover:bg-green-800 rounded-md text-gray-300" @click="updateProduct()">Update</span>
                        <span class="px-3 py-2 bg-gray-500 hover:bg-gray-700 rounded-md text-gray-300 cursor-pointer" @click="editing = !editing">Cancel</span>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>


<script>
    import moment from 'moment'
    export default {
        props: ['product','editing'],
        data() {
            return{
                errors:{}
        }},

        filters:{
            FormatDate:(val => {
                if (val) {
                    return moment(String(val)).format('YYYY/MM/DD hh:mm:ss:A')
                }
            }),
            currency:(val => {
                var formater = Intl.NumberFormat('es-US',{
                    style:'currency',
                    currency:'USD',
                    minimumFractionDigits:0
                });
                return formater.format(val);
            })
        },
        
        methods: {
            lastPurchase(){
                return this.$options.filters.FormatDate(this.product.updated_at);
            },
            updateProduct(){
                this.errors = {};
                axios.patch('/product/' + this.product.id,
                    {product : this.product}).then(response => {
                    console.log("Product Edit Saved Successfully :)");
                    this.editing = false;
                }).catch(error => {
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }});
            },
        }
    }
</script>
