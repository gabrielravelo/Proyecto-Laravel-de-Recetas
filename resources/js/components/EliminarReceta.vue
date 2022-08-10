<template>
  <input 
    type="submit"
    class="btn 
          btn-outline-danger
          text-uppercase
          font-weight-bold 
          d-block 
          w-100 
          mb-2" 
    value="Eliminar X"
    @click="eliminarReceta">
</template>

<script>
import axios from 'axios'

  export default {
    props: ['recetaId'],
    methods: {
      eliminarReceta() {
        this.$swal({
          title: 'Deseas eliminar esta receta?',
          text: "No podrás revertir los cambios!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar!',
          cancelButtonText: 'No borrar'
        }).then((result) => {
          if (result.value) {

            const params = {
              id: this.recetaId
            }

            // enviar la peticion al servidor
            axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
              .then(respuesta => {
                this.$swal({
                  title: 'Receta Eliminada', 
                  text: 'Se eliminó la receta',
                  icon: 'success'
                })

                // eliminar receta del DOM
                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
              })
              .catch(error => {
                console.log(error);
              })

            
          }
        })
      }
    }
  }

</script>