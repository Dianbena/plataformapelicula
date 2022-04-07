<template>
     <div class="container">
       <div class="card">
           <div class="card-header">
               Peliculas
           </div>
           <div class="card-body">
             <table class="table">
                 <thead>
                     <tr>
                         <th>imagen</th>
                         <th>Titulo </th>
                         <th>Descripción</th>
                         <th>Multiples categorias</th>
                         <th>Trailer</th>
                         <th>Fecha estreno</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr v-for="pelicula in peliculas"  :key="pelicula.id">
                         <td scope="row">{{pelicula.imagen}}</td>
                         <td>{{pelicula.titulo}}</td>
                         <td>{{pelicula.descripcion}}</td>
                         
                     </tr>
                 </tbody>
             </table>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            peliculas:[]
        }

    },
    created:function(){
        this.consultarPeliculas();

    },
    methods:{

    consultarPeliculas(){
        fetch('http://localhost/api/plataformapelicula/')
        .then(respuesta=>respuesta.json())
        .then((datosRespuesta)=>{

            console.log(datosRespuesta)

            this.peliculas=[]
            if(typeof datosRespuesta[0].success==='undefined'){
                this.peliculas = datosRespuesta;
            }
    
        })
        .catch(console.log)
    }
    }
}
</script>
