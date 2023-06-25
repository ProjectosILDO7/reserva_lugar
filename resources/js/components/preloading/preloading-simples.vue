<template>
    <div class="Preloading" v-show="preloading">
        <img src="/image/Pre-loading-simples.gif" alt="Loading...">
    </div>
</template>

<script>

export default{

    computed:{
        preloading(){
            return this.$store.state.preloading_simples.preloading
        }
    }
}

</script>

<style scoped>
    .Preloading{
        background:#000;
        position:absolute;
        z-index:9999;
        opacity:.2;
        width:100%;
        height: 100%;
        margin:0;
        text-align: center;
        padding:10% 0
    };
    .Preloading img{
        max-width: 50%;
    }
</style>