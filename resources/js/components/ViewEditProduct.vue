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
                 {{ product.name }}
            </div>
            <div class="py-1 px-5">
                <span class="font-bold">Description : </span>
                 {{ product.description }}
            </div>
            <div class="py-1 px-5">
                <span class="font-bold">Price : </span>
                 ${{ product.price }}
            </div>
            <div class="py-1 px-5">
                <span class="font-bold">In Stock : </span>
                 {{ product.inStock }}
            </div>
            <div class="py-1 px-5">
                <span class="font-bold">last purchase : </span>
                 {{ product.updated_at == product.created_at ? "No purchase yet" : lastPurchase() }}
            </div>

            <div class="pb-4 px-5 text-right">
                <a href="#" class="px-3 py-2 bg-green-600 hover:bg-green-800 rounded-md text-gray-300">Edit</a>
                <a href="#" class="px-3 py-2 bg-red-600 hover:bg-red-800 rounded-md text-gray-300">Delete</a>
            </div>
        </div> 
    </div>
    </div>
</template>


<script>
    import moment from 'moment'
    export default {
    props: ['product'],
    data() {
        return{
            isCart:false
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
        }
    },
    computed: {

    },
    }
</script>
