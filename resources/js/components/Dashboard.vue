<template>
    <div class="container">
            <div class="sidebar">
                <div class="sidebar-con">
                   <ul>
                    <li class="active">Products</li>
                    <li>Events</li>
                    <li>Resouces</li>
                   </ul>
                </div>
            </div>

            <div class="body">
                <div>
                    <new-product></new-product>
                </div>
            </div>
    </div>
</template>

<script>
import NewProduct from './partials/NewProd'
    export default {
        components: {
          NewProduct  
        },
        data () {
            return {
            
            }
        },


        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    .sidebar{
           width: 300px;
            margin-top: 10px;
            background: white;
            float: left;
            height: 100vh;

            .sidebar-con{
                height: 100%;
            padding: 10px;
            box-shadow: 2px 2px 4px #ccc;

            ul{
               margin:0px;
               padding:0px; 

                li{
                margin-bottom: 5px;
                list-style: none;
                padding: 10px;
                background: #e6e8f173;
                border-radius: 5px;
                cursor:pointer;

                &.active{
                        color: #320177;
                        border-right: 4px solid #320177;
                        border-left: 4px solid #320177;
                }
                }
            }
            }
    }

    .body{
        margin-left:300px;
        color:white;
        padding:10px;
    }
</style>
