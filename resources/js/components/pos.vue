<template>
    <div>
        <div class="row">
            <div class="col-md-5">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Search</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" v-model.trim="search" @keyup="fetchData">
                </div>
                <div class="table-responsive-md mt-2">
                    <table class="table">
                        <caption>Items</caption>
                        <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in inventory" :key="item.id">
                            <th scope="row">{{item.item_code}}</th>
                            <td>{{item.item_name}}</td>
                            <td>{{item.description}}</td>
                            <td>{{item.sell_price}}.00</td>
                            <td>
                                <a href="">
                                    <i class="fa fa-cart-arrow-down"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <h1 style="text-align: center"><i class="fa fa-shopping-basket"></i></h1>
                <div class="table-responsive-md mt-2">
                    <table class="table">
                        <caption>Cart Items</caption>
                        <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">001</th>
                            <td>Tissue paper</td>
                            <td>Wema 2pcs</td>
                            <td>
                                <input type="number" class="pos_qty">
                            </td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <th scope="row">002</th>
                            <td>Colgate</td>
                            <td>Herbal 100ml</td>
                            <td>
                                <input type="number" class="pos_qty">
                            </td>
                            <td>120.00</td>
                        </tr>
                        <tr>
                            <th scope="row">003</th>
                            <td>Yoghurt</td>
                            <td>Delamere 500ml</td>
                            <td>
                                <input type="number" class="pos_qty">
                            </td>
                            <td>110.00</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th scope="col" colspan="4">Total</th>
                            <th scope="col">600.00</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-12" style="text-align: center">
                    <button class="btn btn-lg btn-warning">
                        Check Out
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        },
        data(){
            return{
                search:null,
                inventory:[],
            }
        },
        methods:{
            fetchData(){
                let inv = [];
                axios.post('/item-search', {
                    payload : this.search
                })
                    .then(function (res) {
                        for (let i = 0; i < res.data.items.length; i++) {
                            inv.push(res.data.items[i]);
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.inventory=inv;
            }
        }
    }
</script>
