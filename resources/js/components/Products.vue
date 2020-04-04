<template>
     <div id="app">
         
        <div class="mx-20">
            <br>
            <nav id="top-navigation" class="mb-2 flex justify-between">
                <a href="#" @click.prevent="isCart = false"> <i class=" icon icon-home f291"></i> <strong>Mile High Inc.</strong></a>

                <div class="text-right pull-right cart-info">
                    <span class="stats lead"> <i class="icon icon-shopping_cart"></i>{{cart.items.length}}</span>
                    <button class="px-3 py-2 bg-blue-600 rounded-md text-white" @click="isCart = true">View Cart</button>
                </div>
            </nav>

            <div id="products" class="flex flex-wrap" v-if="!isCart">
                <div :key="product.id" v-for="product in products" class="w-full sm:w-1/2 lg:w-1/3 px-0 sm:px-4 mb-6">
                    <div class="bg-white border rounded-lg overflow-hidden ">
                        <div class="relative bg-gray-300 pb-2/3">
                            <img src="http://localhost:8000/css/1.jpg" alt="musab" class="absolute top-0 h-full w-full">
                        </div>
                        
                        <div class="px-4 py-2">
                            <div class="text-xl font-semibold text-gray-800 truncate">{{product.name}}</div>
                            <div class="text-gray-600 font-semibold text-xs mb-2">{{product.description}}</div>
                            
                            <div class="flex flex-wrap justify-between items-baseline">
                                <div class="text-md text-gray-800 font-semibold">{{product.price | currency }} <i class="icon icon-heart-o"></i></div>
                                <div class="text-base text-gray-600 font-semibold flex items-baseline" 
                                    :class="{'text-yellow-500':product.inStock < 10 , 'text-green-900':product.inStock === 0}">
                                        {{product.inStock}} in stock
                                        <button class="bg-green-600 text-white text-xs px-3 py-2 ml-2 rounded-md"
                                         :disabled="product.inStock === 0"
                                         :class="{'cursor-not-allowed':product.inStock === 0}"
                                         @click="addToCart(product)">
                                            Add to cart
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div v-else>
                <div class="flex justify-center">
                    <div class="w-2/3 mx-auto">
                        <div class="text-5xl">Cart</div>
                        <div class="bg-white shadow-md rounded mt-2 mb-6">
                            <table v-if="cart.items.length > 0" class="text-left w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200">
                                <th class="py-4 px-6 font-bold text-sm text-grey-dark border-b">Product</th>
                                <th class="py-4 px-6 font-bold text-sm text-grey-dark border-b">Quantity</th>
                                <th class="py-4 px-6 font-bold text-sm text-grey-dark border-b  text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr :key="item.product.id" v-for="item in cart.items" :if="item.quantity !== 0"  class="hover:bg-grey-100">
                                <td class="py-4 px-6 border-b">{{ item.product.name }}</td>
                                <td class="py-4 px-6 border-b">
                                    {{ item.quantity }}
                                    <button @click="increaseQuantity(item)" :disabled="item.product.inStock == 0" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-600 hover:bg-green-800" :class="{'cursor-not-allowed':item.product.inStock === 0}">+</button>
                                    <button @click="decreaseQuantity(item)" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-600 hover:bg-red-800">-</button>
                                </td>
                                <td class="py-4 px-6 border-b text-center">{{ item.quantity * item.product.price | currency }}</td>
                                </tr>

                                <tr>
                                    <td class="border-b"></td>
                                    <td class="border-b"></td>
                                    <td class="py-2 pr-16 border-b text-center"><span class="font-bold">Sub total :</span> {{ cartTotal | currency }}</td>
                                </tr>
                                <tr>
                                    <td class="border-b"></td>
                                    <td class="border-b"></td>
                                    <td class="py-2 pr-10 border-b text-center"><span class="font-bold">Taxes :</span> {{ taxAmount | currency }}</td>
                                </tr>
                                <tr>
                                    <td class="border-b"></td>
                                    <td class="border-b"></td>
                                    <td class="py-2 pr-16 border-b text-center"><span class="font-bold">Grand total :</span> {{ cartTotal + taxAmount | currency }}</td>
                                </tr>
                                <tr>
                                    <td class="border-b"></td>
                                    <td class="border-b"></td>
                                    <td class="py-2 pr-16 border-b flex justify-end">
                                        <button class="py-2 px-3 bg-green-500 hover:bg-green-700 rounded" @click="checkOut">Checkout</button>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            <p v-else class="py-2 px-3 font-bold">Your cart is currently empty.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
    export default {
    props: ['products'],
    data() {
        return{
            isCart:false,
            cart:{
                items:[]
            },
            errors:{}
    }},

    filters:{
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
        addToCart(product){
            let cartItem = this.getCartItem(product);
            if(cartItem != null){
                cartItem.quantity++;
            }
            else{
            this.cart.items.push({
                product:product,
                quantity:1
            });
            }
            product.inStock--;
        },
        getCartItem(product){
            for (let i = 0; i < this.cart.items.length; i++) {
                if(this.cart.items[i].product.id === product.id){
                    return this.cart.items[i];
                }
            }
            return null;
        },
        increaseQuantity(item){
          item.product.inStock--;
          item.quantity++;
        },
        decreaseQuantity(item){
            item.product.inStock++; 
            item.quantity--;

            if(item.quantity == 0){
                this.removeItem(item);
            }
        },
        removeItem(cartItem){
            let index = this.cart.items.indexOf(cartItem);
            if(index !== -1){
                this.cart.items.splice(index,1);
            }
        },
        checkOut(){
            if(confirm("Purched your products?")){
                this.cart.items.forEach( (item) => {
                    item.product.inStock == item.quantity;

                    // make it model hock
                    // this.errors = {};
                    // axios.patch('/productinstock/' + item.product.id,
                    //  {itemInStock : item.product.inStock}).then(response => {
                    //     console.log('Message sent!');
                    // }).catch(error => {
                    //     if (error.response.status === 422) {
                    //     this.errors = error.response.data.errors || {};
                    // }});
                
                });
                this.cart.items = [];
                alert("Thanks for using our Site , Enjoy your products");
            }
        }

    },
    computed: {
        cartTotal(){
            var total = 0;
            this.cart.items.forEach( (item) => {
                total += item.quantity *  item.product.price;
            });
            return total;
        },
        taxAmount(){
            return ((this.cartTotal * 10)/100);
        }
    },
    }
</script>
