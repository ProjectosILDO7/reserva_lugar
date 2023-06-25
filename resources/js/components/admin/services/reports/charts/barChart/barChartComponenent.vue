<template>
  <div>
    <apexchart width="500" type="Bar" :options="options" :series="series"></apexchart>
  </div>
</template>

<script setup>
import {computed} from 'vue'
const props = defineProps({
  stats:Array
})
const options = {
  chart: {
    id: 'vuechart-example'
  },
  xaxis: {
    categories: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Julh", "Ago", "Set", "Out", "Nov", "Dez"]
  }
}

const series = computed(()=>{
  return [
    {
      name:'Presença do mês',
      data:props.stats
    }
  ]
})

</script>