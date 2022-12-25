<template>
   <Nav/>
   <router-view></router-view>
</template>

<script>
import Nav from '../Nav.vue'
    export default {
         components:{
            Nav:Nav
         }
    }
</script>
