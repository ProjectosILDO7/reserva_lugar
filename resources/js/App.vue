<template>
    <div>
        <preloading/>
        <notifications position="center right" width="50%" />
        <router-view/>
    </div>
</template>

<script>
import preloading from '../js/components/preloading/preloading-simples.vue'

export default{

    components:{
        preloading
    }

}
</script>