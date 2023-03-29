<template>
<div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                         <table class="table align-items-center table-dark">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No.Venta</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="list" v-for="venta in ventas">
                  <tr>
                    <td>
                    {{venta.id}}
                    </td>
                    <td>
                     {{venta.id_cliente}}
                    </td>
                    <td>
                      {{venta.created_at}}
                      </td>
                      <td v-column-sortable:venta.created_at>
                      {{venta.estado}}
                        </td>
                   <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                           <a class="dropdown-item"  v-if="venta.estado == 'Abierta'" v-on:click="editar_venta(venta)" >Editar</a>
                           <a class="dropdown-item"  v-on:click="eliminar_venta(venta)">Eliminar</a>
                           <a class="dropdown-item"   v-if="venta.estado == 'Abierta'" v-on:click="cerrar_venta(venta)" >Cancelar Venta</a>
                           <a class="dropdown-item"   v-if="venta.estado == 'Abierta'" v-on:click="completar_ventar(venta)" >Completar Venta</a>

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
<button type="button" class="btn btn-success" v-on:click="nuevo_venta()">
  Nuevo venta
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la venta</h5>
        <button type="button" class="close" v-on:click="abrir_cierra_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
           <div class="row">         
                <div class="col-md-6">
                <label>Selecciona al cliente</label>

                <select v-model="venta.id_cliente" id="id_cliente" >
        
             <option v-for="cliente in clientes" v-bind:key="cliente.id" v-bind:value="cliente.id">{{cliente.nombre}}</option>
             </select>
                </div>
                </div> 
                <br>
            <div class="row">         
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" class="form-control" v-model="venta.detalle" id="detalle" placeholder="Descipcion de la venta"> 
                </div>
                </div>
                <div class="col-md-6"> 
                <div class="form-group">
                </div>
                </div>
                <div>
                </div>
            </div>    
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_cierra_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_ventas()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL PARA EDITAR ventaS-->
<div class="modal fade" id="produtmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del venta</h5>
        <button type="button" class="close" v-on:click="abrir_c_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>

             <div class="row">         
                <div class="col-md-6">
                <label>Selecciona al cliente</label>
                <select v-model="venta.id_cliente" id="id_cliente">
              <option selected>Cliente</option>
             <option v-for="cliente in clientes" v-bind:key="cliente.id" v-bind:value="cliente.id">{{cliente.nombre}}</option>
             </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" class="form-control" v-model="venta.detalle" id="detalle" placeholder="Descipcion de la venta"> 
                </div>
                </div>
                <div>
                </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_c_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_p(venta)" >Guardar</button>
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
                ventas: {},
                venta: {},
                file:'',
                url: '',
                value1:'',
                sortable: true,

            }
        }
        ,mounted() {
            console.log('Component mounted.');
            this.obtener_ventas();
            this.obtener_clientes();
            this.obtener_reportes();
            this.ocultar(venta);
            console.log('Component mounted 2');
        },
        methods:{
            asignaArchivo(e){
                this.file = e.target.files[0];
                this.url = URL.createObjectURL(this.file);
            },
            obtener_ventas(){
                axios.get('api/ventas/lista')
                .then((response) => {
                    console.log("Todo Ok");
                    this.ventas = response.data;
                    this.ocultar(venta);
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error");
                })
            },
             obtener_clientes(){
                axios.get('api/clientes/lista')
                .then((response) => {
                    console.log("Todo Ok");
                    this.clientes = response.data;
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error")
                })
            },
            obtener_reportes(){
                axios.get('api/reportes/lista')
                .then((response) => {
                    console.log("Todo Ok");
                    this.reportes = response.data;
                })
                
                .catch((error) => {
                    console.log("Ocurrio un Error")
                })
            },
            guardar_ventas(){
                 var formData = new FormData()
                  formData.append("imagen", this.file)

                  //formData.append("id", this.venta.id)
                  formData.append("id_cliente", this.venta.id_cliente);
                  formData.append("detalle", this.venta.detalle);

                axios.post('api/ventas/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados");
                    this.abrir_cierra_modal();
                    this.obtener_ventas();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            }, 
            guardar_p(){
                 var formData = new FormData()

                  formData.append("id", this.venta.id);
                  formData.append("id_cliente", this.venta.id_cliente);
                  formData.append("detalle", this.venta.detalle);


                axios.post('api/ventas/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados");
                    this.abrir_c_modal();
                    this.obtener_ventas();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            },
            eliminar_venta(venta){
                axios.post('api/ventas/eliminar',venta)
                .then((response) => {
                    console.log("venta Eliminado");
                   // this.abrir_cierra_modal();
                    this.obtener_ventas();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            },
            abrir_cierra_modal(){ 
                this.obtener_reportes();
                $('#exampleModal').modal('toggle');
            },
            abrir_c_modal(){
                $('#produtmodal').modal('toggle');
            },
            editar_venta(venta)
            {
                this.venta = venta;
                this.venta.id = venta.id;  
                this.abrir_c_modal();
            },
            nuevo_venta(){
                this.venta = {}
                this.obtener_clientes();
                this.obtener_reportes();
                this.abrir_cierra_modal();
                
            },
            cerrar_venta(venta){
              console.log("Se cerro la venta");
              axios.post('api/ventas/cerrar',venta)
              .then((response) => {
                  console.log(reponse.data)
                  this.obtener_ventas()

              })
              .catch((error) =>{
                console.log(error.data)
              })
            },
           completar_ventar(venta){
              console.log("Se completo la venta");
              axios.post('api/ventas/completa',venta)
              .then((response) => {
                  console.log(reponse.data)
                  this.obtener_ventas()

              })
              .catch((error) =>{
                console.log(error.data)
              })
             
            },
            ocultar(venta){
              if(this.venta.estado !="Abierta"){
                value1=false;

              }else{
                value1=true;
              }
            },
        }
    };
</script>