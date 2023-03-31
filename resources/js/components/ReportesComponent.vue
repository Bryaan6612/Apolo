<template>
<div>

    <div class="container">
        <div class="row justify-content">
            <div class="col-md-14">
              <div class="container py-2">
               
                <ul id="showlist" tabindex='1' class="list-group"></ul>
                             
          </div>
          <!----<nav class="navbar navbar-light justify-content-between">
          <form class="form-inline">
            <input id-="buscarpor" name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <input id-="buscarporArea" name="buscarporArea" class="form-control mr-sm-2" type="search" placeholder="Buscar por area" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>-->
        <nav class="navbar navbar-light justify-content-between">
          <div class="form-inline">
            <input name="buscarporNombre"  class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <input name="buscarporArea" class="form-control mr-sm-2" type="search" placeholder="Buscar por area" aria-label="Search">
            <input name="buscarporFecha" class="form-control mr-sm-2" type="search" placeholder="Buscar por Fecha y Hora" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" v-on:click="obtener_reportes()">Buscar</button>
            <button class="btn btn-outline-warning my-2 my-sm-0" v-on:click="obtener_reportes2()">Regresar</button>
          </div>
        </nav>



          <table class="table table-striped" >
                          
                <!--<thead class="thead-dark"> -->
                  <tr>
                    
                    <th scope="col">Nombre del Area </th>
                    <th scope="col">Nombre del Cliente</th>
                    <th scope="col">Nombre del Técnico que Resolvio</th>
                    <th scope="col">Reporte/Observaciones</th>
                    <th scope="col">Fecha y Hora del Reporte</th>
                    <th scope="col">Estado</th>
                   <th scope="col">Imagen</th>
                    <th></th>
                      
                  </tr>
                <!--</thead>-->
                <tbody class="list" v-for="reporte in reportes">
                  <tr>
                    <td>
                    {{reporte.nombre_area}}             
                    </td>
                    <td>
                     {{reporte.nombre_cliente}}
                    </td>
                    <td>
                    {{reporte.nombre_tecnico}}
                    </td>
                    <td>
                    {{reporte.reporte}}
                    </td>
                    <td>
                    {{reporte.feyhora}}
                    </td>
                    <td>
                    {{reporte.estado}}
                    </td>
                    <td class="budget">  
                     <!---<img src="{{assets('public/images'.'/'.$reportes -> imagen)}}" alt="" width="100" class="img-thumbnail img-fluid">-->   
                       <!--<img class="card-img-top" v-bind:src="'/' + reporte.imagen">-->
                      <img v-if="reporte.imagen" :src="reporte.imagen.replace('/imagenes_apolo')" width="200px" />
                     
                      </td>
                   <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" v-on:click="editar_reporte(reporte)" >Editar</a>
                          <a class="dropdown-item" v-on:click="eliminar_reporte(reporte)">Eliminar</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
                  </table>
                  
                    </div>
                   
                </div>
            </div>
       
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" v-on:click="nuevo_reporte()">
  Nuevo Reporte
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Reporte</h5>
        <button type="button" class="close" v-on:click="abrir_cierra_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="row">         
                <div class="col-md-6">
                  <input ref="upload"
                                type="file"
                                name="file-upload"
                                multiple=""
                                accept="image/jpeg, image/png"
                                @change="asignaArchivo">
                </div>
       </div>
                <div class="col-md-6">
                  <img :src='url' width="150px">
                </div>
                
            <div class="row">         
                <div class="col-md-6">
                <div class="form-group">
                  <h4>AREAS </h4>
                    <select name="area_id" v-model="reporte.nombre_area" id ="nombre_area"  class="form-control">
                      <option value="" selected disabled hidden>Choose here</option>
                      <option value="Tesoreria">Tesoreria</option>
                      <option value="Contraloria">Contraloria</option>
                      <option value="SeguridadP">Seguridad publica</option>
                      <option value="Presidencia">Presidencia</option>
                      <option value="ObrasP">Obras Publicas</option>
                      <option value="Proteccion">Poteccion Civil</option>

                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>NOMBRE DEL CLIENTE </h4>
                    <input type="text" class="form-control"  v-model="reporte.nombre_cliente" id="nombre_cliente" >
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <h4>TECNICOS </h4>
                  <select name="tecnico_id" v-model="reporte.nombre_tecnico" id ="nombre_tecnico"  class="form-control" >
                    <option value="Bryan">Bryan</option>
                      <option value="Alberto">Alberto</option>
                      <option value="Gonzalo">Gonzalo</option>
                      <option value="Christian">Christian</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>INFORMACION DEL REPORTE</h4>
                    <input type="text" class="form-control" v-model="reporte.reporte" id="reporte">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>ESTADO</h4>
                    <select name="estado_id" v-model="reporte.estado" id ="estado"  class="form-control" >
                    <option value="Activo">Activo</option>
                      <option value="Cancelado">Cancelado</option>
                      <option value="Terminado">Terminado</option>
                      <option value="En Espera">En Espera</option>

                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>FECHA Y HORA </h4>
                  <input type="datetime-local" v-model="reporte.feyhora" id="feyhora">
                </div>
                </div>
            </div>
            
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_cierra_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_reportes()" >Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL PARA EDITAR Reportes-->
<div class="modal fade" id="produtmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del Reporte</h5>
        <button type="button" class="close" v-on:click="abrir_c_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="row">         
                <div class="col-md-6">
                  <input ref="upload"
                                type="file"
                                name="file-upload"
                                multiple=""
                                accept="image/jpeg, image/png, image/jpg"
                                @change="asignaArchivo">
                </div>
       </div>
                <div class="col-md-6">
                  <img :src='url' width="150px">
                </div>
                
                <div class="row">         
                <div class="col-md-6">
                <div class="form-group">
                  <h4>AREAS </h4>
                    <select name="area_id" v-model="reporte.nombre_area" id ="nombre_area"  class="form-control">
                      <option value="" selected disabled hidden>Choose here</option>
                      <option value="Tesoreria">Tesoreria</option>
                      <option value="Contraloria">Contraloria</option>
                      <option value="SeguridadP">Seguridad publica</option>
                      <option value="Presidencia">Presidencia</option>
                      <option value="ObrasP">Obras Publicas</option>
                      <option value="Proteccion">Poteccion Civil</option>

                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>NOMBRE DEL CLIENTE </h4>
                    <input type="text" class="form-control"  v-model="reporte.nombre_cliente" id="nombre_cliente" >
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <h4>TECNICOS </h4>
                  <select name="tecnico_id" v-model="reporte.nombre_tecnico" id ="nombre_tecnico"  class="form-control" >
                    <option value="Bryan">Bryan</option>
                      <option value="Alberto">Alberto</option>
                      <option value="Gonzalo">Gonzalo</option>
                      <option value="Christian">Christian</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>INFORMACION DEL REPORTE</h4>
                    <input type="text" class="form-control" v-model="reporte.reporte" id="reporte">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>ESTADO</h4>
                    <select name="estado_id" v-model="reporte.estado" id ="estado"  class="form-control" >
                    <option value="Activo">Activo</option>
                      <option value="Cancelado">Cancelado</option>
                      <option value="Terminado">Terminado</option>
                      <option value="En espera">En espera</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>FECHA Y HORA </h4>
                  <input type="datetime-local" v-model="reporte.feyhora" id="feyhora">
                </div>
                </div>
            </div>
            
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_c_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_r(reporte)" >Guardar</button>
      </div>
    </div>
    
  </div>
</div>
</div>
</template>

<script>
import { title } from 'process'

    export default {
            
        data(){
            return {
                reportes: [],
                reporte: [],
                buscador: '',
                file:'',
                url: '',
                rows: 100,
                currentPage: 1,
            }
        }
        ,mounted() {
            console.log('Component mounted.')
            this.obtener_reportes()
            console.log('Component mounted 2')
        },
        methods:{

          traerReportes(){
          axios.get('/traer-reportes', {
            params:{
              buscador: this.buscador
            }
          })
          .then( res => {
            this.reportes = res.data
          })
          .catch(error => {
            console.log(error.response)
          });       

          },

          buscarReportes(){

            clearTimeout(this.setTimeoutBuscador)
            this.setTimeoutBuscador = setTimeout (this.traerReportes,360)
          },
            asignaArchivo(e){
                this.file = e.target.files[0];
                this.url = URL.createObjectURL(this.file);
            },
            
            obtener_reportes(){
                let nombreTecnico = document.getElementsByName("buscarporNombre")[0].value,
                    nombreArea = document.getElementsByName("buscarporArea")[0].value,
                    Fecha = document.getElementsByName("buscarporFecha")[0].value;

                axios.get('api/reportes/lista',  { params: { 
                    buscarporNombre: nombreTecnico,
                    buscarporArea: nombreArea,
                    buscarporFecha: Fecha,
                  } 
                })
                .then((response) => {
                    console.log("Todo Ok")
                    this.reportes = response.data
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error")
                    console.log(error)
                })
            },
            obtener_reportes2(){
                axios.get('api/reportes/lista')
                .then((response) => {
                    console.log("Todo Ok")
                    this.reportes = response.data
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error")
                })
            },
            guardar_reportes(){
                 var formData = new FormData()
                  formData.append("imagen", this.file)

                  //formData.append("id", this.reporte.id)
                  formData.append("nombre_area", this.reporte.nombre_area)
                  formData.append("nombre_cliente", this.reporte.nombre_cliente)
                  formData.append("nombre_tecnico", this.reporte.nombre_tecnico)
                  formData.append("reporte", this.reporte.reporte)
                  formData.append("feyhora", this.reporte.feyhora)
                  formData.append("estado", this.reporte.estado)


                axios.post('api/reportes/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados")
                    this.abrir_cierra_modal();
                    this.obtener_reportes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            }, 
            guardar_r(){
                 var formData = new FormData()
                  formData.append("imagen", this.file)

                  formData.append("id", this.reporte.id)
                  formData.append("nombre_area", this.reporte.nombre_area)
                  formData.append("nombre_cliente", this.reporte.nombre_cliente)
                  formData.append("nombre_tecnico", this.reporte.nombre_tecnico)
                  formData.append("reporte", this.reporte.reporte)
                  formData.append("feyhora", this.reporte.feyhora)
                  formData.append("estado", this.reporte.estado)


                axios.post('api/reportes/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados")
                    this.abrir_c_modal();
                    this.obtener_reportes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            },
            eliminar_reporte(reporte){
                axios.post('api/reportes/eliminar',reporte)
                .then((response) => {
                    console.log("Reporte Eliminado")
                   // this.abrir_cierra_modal();
                    this.obtener_reportes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            },
            abrir_cierra_modal(){
                $('#exampleModal').modal('toggle')
            },
            abrir_c_modal(){
                $('#produtmodal').modal('toggle')
            },
            editar_reporte(reporte)
            {
                this.reporte = reporte
                this.reporte.id = reporte.id
                 
                this.abrir_c_modal()
            },
            nuevo_reporte(){
                this.reporte = {}
                this.abrir_cierra_modal()
            }
          
        }
    }
</script>

