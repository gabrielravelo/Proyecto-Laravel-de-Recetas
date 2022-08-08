<template>
  <input 
    type="submit" 
    class="btn btn-danger mr-1 d-block w-100 mb-2" 
    value="Eliminar ×"
    @click="eliminarReceta"  
  >
</template>


<script> 
  export default {
    props: ['recetaId'],
    methods: {
      eliminarReceta() {
        this.$swal({
          title: 'Probando Alerta',
          text: 'funcina Bien!',
          icon: 'success'
        })
      }
    }
  }
</script>
