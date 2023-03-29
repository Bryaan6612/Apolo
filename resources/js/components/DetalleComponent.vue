<template>
<div>

    <div class="container">
        
        <div class="row justify-content-center">
            
            <div class="col-md-12">
          
                         <table class="table align-items-center table-dark">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No.Venta</th>
                    <th scope="col">No.reporte</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th>Editar o Eliminar</th>                    
                  </tr>
                </thead>
                <tbody class="list-dark" v-for="detalleventa in detalleventa">
                  <tr>
                    <td>
                    {{detalleventa.id_venta}}
                    </td>
                    <td>
                     {{detalleventa.id_reporte}}
                    </td>
                     <td>
                    {{detalleventa.cantidad}}
                    </td>
                    <td >
                     {{detalleventa.precio}}
                    </td>
                   <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-center dropdown-menu-arrow">
                          <a class="dropdown-item" v-on:click="editar_venta(detalleventa)" >Editar</a>
                          <a class="dropdown-item" v-on:click="eliminar_venta(detalleventa)">Eliminar</a>
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
<button type="button" class="btn btn-dark" v-on:click="nuevo_detalleventa()">Detalle venta</button>
  <br>

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
                   
   <label>Selecciona la venta</label>
        <select v-model="detalleventa.id_venta" id="id_venta">
        <option v-for="ventas in venta" v-bind:key="ventas.id" v-bind:value="ventas.id" >{{ventas.id}}</option>
        </select>
                </div>
                </div> 
                    <br>
            <div class="row">         
                <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <br>
                 <label>Selecciona el reporte</label>
             <select v-model="detalleventa.id_reporte" id="id_reporte">
            <option v-for="reporte in reportes" v-bind:key="reporte.id" v-bind:value="reporte.id" >{{reporte.nombre}}</option>
             </select>
            <br>
            <br>
            <label>Cantidad de reportes</label>
            <input placeholder="Cant." class="form-control-sm" v-model="detalleventa.cantidad" required type="number" value="" min="0" max="100" id="cantidad"/> 
            <br>
            <br>
             <label>Precio del reporte </label>
                <input type="text" class="form-control-sm" v-model="detalleventa.precio" id="precio" placeholder="Precio" >
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
        <button type="button" class="btn btn-primary" v-on:click="guardar_detalleventa()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL PARA EDITAR detalleventa-->
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

            <select v-model="detalleventa.id_venta" id="id_venta">
           <option v-for="ventas in venta" v-bind:key="ventas.id" v-bind:value="ventas.id" >{{ventas.id}}</option>
            </select>
               <label>Selecciona la venta</label>
                    <select v-model="detalleventa.id_reporte" id="id_reporte">
            <option v-for="reporte in reportes" v-bind:key="reporte.id" v-bind:value="reporte.id" >{{reporte.nombre}}</option>
            </select>
            <br>
            <br>
            <label>Cantidad de reportes</label>
            <input placeholder="Cant." class="form-control-sm" v-model="detalleventa.cantidad" required type="number" value="" min="0" max="100" id="cantidad"/> 
            <br>
            <br>
             <label>Precio del reporte </label>
                <input type="text" class="form-control-sm" v-model="detalleventa.precio" id="precio" placeholder="Precio" >
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                </div>
                </div>
                <div>
                </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="abrir_c_modal">Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click="guardar_p(detalleventa)" >Guardar</button>
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
                detalleventa: {},
                venta: {},
                file:'',
                url: '',
                
            }
        }
        ,mounted() {
            console.log('Component mounted.');
            this.obtener_detalleventa();
            this.obtener_ventas();
            this.obtener_reportes();
            this.obtener_clientes();
            console.log('Component mounted 2');
        },
        methods:{
            asignaArchivo(e){
                this.file = e.target.files[0];
                this.url = URL.createObjectURL(this.file);
            },
            obtener_detalleventa(){
                axios.get('api/detalleventa/lista')
                .then((response) => {
                    console.log("Todo Ok");
                    this.detalleventa = response.data;
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
             obtener_ventas(){
                axios.get('api/ventas/lista')
                .then((response) => {
                    console.log("Todo Ok");
                    this.venta = response.data;
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
            guardar_detalleventa(){
                 var formData = new FormData()
             
                  //formData.append("id", this.venta.id)
                  formData.append("id_venta", this.detalleventa.id_venta);
                  formData.append("id_reporte", this.detalleventa.id_reporte);
                  formData.append("cantidad", this.detalleventa.cantidad);
                  formData.append("precio", this.detalleventa.precio);


                axios.post('api/detalleventa/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados");
                    this.abrir_cierra_modal();
                    this.obtener_ventas();
                     this.obtener_reportes();
                    this.obtener_detalleventa();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            }, 
            guardar_p(){
                 var formData = new FormData()
                  formData.append("id", this.detalleventa.id);
                  formData.append("id_venta", this.detalleventa.id_venta);
                  formData.append("id_reporte", this.detalleventa.id_reporte);
                  formData.append("cantidad", this.detalleventa.cantidad);
                  formData.append("precio", this.detalleventa.precio);


                axios.post('api/detalleventa/guardar',formData)
                .then((response) => {
                    console.log("Datos Guardados");
                    this.abrir_c_modal();
                    this.obtener_ventas();
                    this.obtener_detalleventa();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            },
            eliminar_venta(venta){
                axios.post('api/detalleventa/eliminar',venta)
                .then((response) => {
                    console.log("venta Eliminado");
                   // this.abrir_cierra_modal();
                    this.obtener_detalleventa();
                })
                .catch((error) => {
                    console.log("Ocurrio un Error Guardando");
                })
            },
            abrir_cierra_modal(){ 
                this.obtener_ventas();
                $('#exampleModal').modal('toggle');
            },
            abrir_c_modal(){
                $('#produtmodal').modal('toggle');
            },
            editar_venta(detalleventa)
            {
                this.detalleventa = detalleventa
                this.obtener_ventas();
                this.obtener_reportes();
                this.abrir_c_modal();
            },
            nuevo_detalleventa(){
                this.detalleventa = {}
                this.obtener_ventas();
                this.obtener_reportes();
                this.abrir_cierra_modal();
                
            }
          
        }
    }
</script>