<template>
    <div class="Preloading" v-show="carregar">
        <img src="/image/Pre-loading-Carregando.gif" alt="Preloading...">
        {{ carregar }}
    </div>
</template>

<script>

export default{

    computed:{
        carregar(){
            return this.$store.state.carregar.loading
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