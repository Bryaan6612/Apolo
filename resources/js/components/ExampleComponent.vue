<template>
<div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
           
                         <table class="table align-items-center table-dark">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edificio</th>
                    <th scope="col">Area</th>
                    <th scope="col">Eje</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody class="list" v-for="cliente in clientes">
                  <tr>
                    <td v-text="cliente.nombre">
                    </td>
                    <td v-text="cliente.apellidos">
                    </td>
                    <td v-text="cliente.edificio">
                    </td>
                    <td v-text="cliente.area">
                    </td>
                    <td v-text="cliente.eje">
                    </td>
                    <td v-text="cliente.correo">
                    </td>
                    <td v-text="cliente.telefono">
                    </td> 
                   <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" v-on:click="editar_cliente(cliente)" >Editar</a>
                          <a class="dropdown-item" v-on:click="eliminar_cliente(cliente)">Eliminar</a>
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
<button type="button" class="btn btn-info" v-on:click="nuevo_cliente()">
  Registrar cliente nuevo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR NUEVO CLIENTE </h5>
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
                    <input type="text" class="form-control" v-model="cliente.nombre" id="nombre" placeholder="Nombre">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.apellidos" id="Apellidos" placeholder="Apellidos">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.edificio" id="Edificio" placeholder="Edificio">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.area" id="Apellidos" placeholder="Area">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.eje" id="Eje" placeholder="Eje">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="cliente.telefono" id="telefono" placeholder="Telefono">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="cliente.correo" id="correo" placeholder="Correo">
                </div>
                </div>
            </div>
            
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_cierra_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_cliente()" >Guardar</button>
      </div>
    </div>
  </div>
</div>
    <!--editar modal-->
    <div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Clientes</h5>
        <button type="button" class="close" v-on:click="abrir_modal" aria-label="Close">
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
                    <input type="text" class="form-control" v-model="cliente.nombre" id="nombre" placeholder="Nombre">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.apellidos" id="apellidos" placeholder="Apellidos">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.edificio" id="edificio" placeholder="Edificio">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.area" id="area" placeholder="Area">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control"  v-model="cliente.eje" id="eje" placeholder="Eje">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="cliente.telefono" id="telefono" placeholder="Telefono">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="cliente.correo" id="correo" placeholder="Correo">
                </div>
                </div>
            </div>
            
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardarte(cliente)" >Guardar</button>
      </div>
    </div>

  </div>
</div>
</div>

</template>

<script>
    export default {

        data(){
            return {
                clientes: {},
                cliente: {},
                file:'',
                url: '',
                
            }
        }
        ,mounted() {
            console.log('Component mounted.')
            this.obtener_clientes()
            console.log('Component mounted 2')
        },
        methods:{
            asignaArchivo(e){
                this.file = e.target.files[0];
                this.url = URL.createObjectURL(this.file);
            },
            obtener_clientes(){
                axios.get('api/clientes/lista')
                .then((response) => {
                    console.log("Todo Ok")
                    this.clientes = response.data
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error")
                })
            },
            guardar_cliente(){
                 var formData = new FormData()
                  formData.append("imagen", this.file)
                  //formData.append("id", this.cliente.id)
                  formData.append("nombre", this.cliente.nombre)
                  formData.append("apellidos", this.cliente.apellidos)
                  formData.append("edificio", this.cliente.edificio)
                  formData.append("area", this.cliente.area)
                  formData.append("eje", this.cliente.eje)
                  formData.append("telefono", this.cliente.telefono)
                  formData.append("correo", this.cliente.correo)


                axios.post('api/clientes/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados")
                    this.abrir_cierra_modal();
                    this.obtener_clientes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            },
            guardarte(){
                 var formData = new FormData()
                  formData.append("imagen", this.file)
                  formData.append("id", this.cliente.id)
                  formData.append("nombre", this.cliente.nombre)
                  formData.append("apellidos", this.cliente.apellidos)
                  formData.append("edificio", this.cliente.edificio)
                  formData.append("area", this.cliente.area)
                  formData.append("eje", this.cliente.eje)
                  formData.append("telefono", this.cliente.telefono)
                  formData.append("correo", this.cliente.correo)


                axios.post('api/clientes/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados")
                    this.abrir_modal();
                    this.obtener_clientes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            },
            eliminar_cliente(cliente){
                axios.post('api/clientes/eliminar',cliente)
                .then((response) => {
                    console.log("Cliente Eliminado")
                   // this.abrir_cierra_modal();
                    this.obtener_clientes();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando")
                })
            },
            abrir_cierra_modal(){
                $('#exampleModal').modal('toggle')
            },
            abrir_modal(){
                $('#editarmodal').modal('toggle')
            },
            editar_cliente(cliente)
            {
                this.cliente = cliente
                this.cliente.id = cliente.id  

                this.abrir_modal()
            },
            nuevo_cliente(){
                this.cliente = {}
                this.abrir_cierra_modal()
            }
        }
    }
</script>

