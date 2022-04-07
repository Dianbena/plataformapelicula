<template>
    <div class="contanier">
        <div class="card">
            <div class="card-header">
                Agregar Pelicula
            </div>
            <div class="card-body">

                <form v-on:submit.prevent="agregarRegistro">
                    <div class="form-group">
                      <label for="imagen">Imagen/caratula</label>
                      <input type="file" class="form-control-file"  name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
                    </div>
                    <div class="form-group">
                      <label for="titulo">Título</label>
                      <input type="text"
                        class="form-control" name="titulo" v-model="pelicula.titulo" id="titulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripción</label>
                      <input type="text"
                        class="form-control" name="descripcion" v-model="pelicula.descripcion"  id="descripcion" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="duracion">Duración</label>
                      <input type="text"
                        class="form-control" name="duracion" v-model="pelicula.duracion"  id="duracion" aria-describedby="helpId" placeholder="">
                    </div>
                   <div class="form-group">
                     <label for=""></label>
                     <select  class="form-control" name="categoria"  v-model="pelicula.categoria" id="categoria">
                       <option selected>Seleccione</option>
                       <option>Accion</option>
                       <option>Animacion</option>
                       <option>Drama</option>
                       <option>Comedia</option>
                       <option>Ciencia ficcion</option>
                       
                     </select>
                   </div>
                   <div class="form-group">
                     <label for="trailer">Trailer de youtube</label>
                     <input type="text"
                       class="form-control" name="trailer" v-model="pelicula.trailer"  id="trailer" aria-describedby="helpId" placeholder="trailer">
                   </div>
                   <div class="form-group">
                     <label for="fecha_estreno">Fecha de estreno</label>
                     <input type="date"
                         class="form-control form-control-sm" v-model="pelicula.fecha_estreno"  name="fecha_estreno" id="fecha_estreno" aria-describedby="helpId" placeholder="">
            
                   </div>
                   <div class="btn-group" role="group" aria-label="">
                       <button type="submit" class="btn btn-success">Agregar</button>
                       <button type="button" class="btn btn-warning">Cancelar</button>
                   </div>
                    
                </form>
              
            </div>
        </div>
        
    </div>
</template>

<script>

export default {
    data(){
        return{
            pelicula:{

                titulo:'',
                descripcion:'',
                duracion:'',
                categoria:'',
                trailer:'',
                fecha_estreno:'',


            }
        }
    },

    methods:{
        agregarRegistro(){
            console.log(this.pelicula)
            var datosEnviar= {titulo:this.pelicula.titulo, descripcion:this.pelicula.descripcion, duracion:this.pelicula.duracion, categoria:this.pelicula.categoria,trailer:this.pelicula
            .trailer, fecha_estreno:this.pelicula.fecha_estreno }

            fetch('http://localhost/api/plataformapelicula/?insertar=1',{
                method:'POST',
                body:JSON.stringify(datosEnviar)

            })
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta=>{
                console.log(datosRespuesta);
                window.location.href='listarpelicula'
            }))
        }
    }
    
}
</script>