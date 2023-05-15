<template>
<div>

    <div class="">
        <div class="">
            <div class="">
              <div class="">
               
                <ul id="showlist" tabindex='1' class="list-group"></ul>
                             
          </div>
       
        <nav class="navbar navbar-light justify-content-between">
          <div class="form-inline">
            <input name="buscarporNombre"  class="form-control mr-sm-2" type="search" placeholder="Buscar por Cliente" aria-label="Search">
            <input name="buscarporArea" class="form-control mr-sm-1" type="search" placeholder="Buscar por Area" aria-label="Search">
            <input name="buscarporFecha" class="form-control mr-sm-2" type="search" placeholder="Buscar por Fecha Inicial" aria-label="Search">
            <input name="buscarporFechaF" class="form-control mr-sm-2" type="search" placeholder="Buscar por Fecha Final" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" v-on:click="obtener_reportes()">Buscar</button>
            <button class="btn btn-outline-warning my-2 my-sm-0" v-on:click="obtener_reportes2()">Regresar</button>
          </div>
        </nav>



          <table  class="table table-responsive sm-0">
            
                          
                <!--<thead class="thead-dark"> -->
                  <tr>
                    
                    <th scope="col">Nombre del Area </th>
                    <th scope="col">Nombre del Cliente</th>
                    <th scope="col">Nombre del Técnico que Resolvio</th>
                    <th scope="col">Reporte/Observaciones</th>
                    <th scope="col">Fecha Inicial</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Final</th>
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
                    <td>
                      {{ reporte.feyhorafinal }}
                    </td>
                    <td class="budget">  
                     <!---<img src="{{assets('public/images'.'/'.$reportes -> imagen)}}" alt="" width="100" class="img-thumbnail img-fluid">  
                       <img class="card-img-top" v-bind:src="'/' + reporte.imagen">
                      <img v-if="reporte.imagen" :src="reporte.imagen.replace('/imagenes_apolo')" width="200px" />-->
                     
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
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button type="button" class="btn btn-dark me-md-2" v-on:click="nuevo_reporte()">
  Nuevo Reporte
</button>
</div>

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
                 <!----<input ref="upload"
                                type="file"
                                name="file-upload"
                                multiple=""
                                accept="image/jpeg, image/png, image/jpg"
                                @change="asignaArchivo">
                </div>
       </div>
                <div class="col-md-6">
                  <img :src='url' width="150px">
                </div>-->
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
                      <option value="Administración">Administración</option>
                      <option value="Agua Potable, Drenaje Y Alcantarillado">Agua Potable, Drenaje Y Alcantarillado</option>
                      <option value="Anticorrupción">Anticorrupción</option>
                      <option value="Contraloria">Contraloria</option>
                      <option value="Catastro">Catastro</option>
                      <option value="Archivo Municipal">Archivo Municipal</option>                
                      <option value="Biblioteca">Biblioteca</option>
                      <option value="Biblioteca Digital">Biblioteca Digital</option>
                      <option value="Desarrollo y Bienestar Social">Desarrollo y Bienestar Social</option>
                      <option value="Derechos Humanos">Derechos Humanos</option>
                      <option value="Desarrollo Urbano">Desarrollo Urbano</option>
                      <option value="DIF">DIF</option>
                      <option value="Ecología y Medio Ambiente">Ecología y Medio Ambiente</option>
                      <option value="Educación y Cultura">Educación y Cultura</option>
                      <option value="IMCUFIDET">IMCUFIDET</option>
                      <option value="Juridico">Jurídico</option>
                      <option value="Obras Publicas">Obras Publicas</option>
                      <option value="Oficialia">Oficialia Calificadora</option>
                      <option value="Bomberos">Protección Civil y Bomberos</option>
                      <option value="Presidencia">Presidencia</option>                
                      <option value="Salud Municipal">Salud Municipal</option>
                      <option value="Secretaria del Ayuntamiento">Secretaria del Ayuntamiento</option>
                      <option value="Secretaria Técnica">Secretaria Técnica de Seguridad Publica</option>
                      <option value="Seguridad Publica">Seguridad publica</option>
                      <option value="Servicios Publicos">Servicios Publicos</option>
                      <option value="Sindicatura">Sindicatura</option>
                      <option value="Tesoreria">Tesoreria</option>
                      <option value="Regiduria">Regidurias</option>
                      <option value="Registro Civil">Registro Civil</option>
                      <option value="UIPPE">UIPPE</option>
                      <option value="Unidad de Transparencia/Consulta Ciudadana">Unidad de Transparencia/Consulta Ciudadana</option>

                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>NOMBRE DEL CLIENTE </h4>
                    <select name="cliente_id" v-model="reporte.nombre_cliente" id="nombre_cliente" class="form-control">

                      <option value="Alexandra López Mauricio">Alexandra López Mauricio</option>
                      <option value="Angel Rivas">Angel Rivas</option>
                      <option value="Ángeles Chavarría Rodríguez">Ángeles Chavarría Rodríguez</option>
                      <option value="Araceli Carmona Cruz">Araceli Carmona Cruz</option>
                      <option value="Arantxa Aldana Hernández">Arantxa Aldana Hernández</option>
                      <option value="Benito Medina Martínez">Benito Medina Martínez</option>                
                      <option value="Inés Acosta Ortega">Inés Acosta Ortega</option>
                      <option value="Claudia Rodríguez Rodríguez">Claudia Rodríguez Rodríguez</option>
                      <option value="Denisse Ortíz Hernández">Denisse Ortíz Hernández</option>
                      <option value="Doroteo Rodríguez">Doroteo Rodríguez</option>
                      <option value="Dr. Juan Martínez Rodríguez">Dr. Juan Martínez Rodríguez</option>
                      <option value="Gilberto Suárez Lozano">Gilberto Suárez Lozano</option>
                      <option value="Guadalupe Huerta González">Guadalupe Huerta González</option>                
                      <option value="Guadalupe García Torres">Guadalupe García Torres</option>
                      <option value="Guadalupe Martínez Rodríguez">Guadalupe Martínez Rodríguez</option>
                      <option value="Jazmin Barrera Ortega">Jazmin Barrera Ortega</option>
                      <option value="Jorge Vargas Vázquez">Jorge Vargas Vázquez</option>
                      <option value="Joselin A. Ortíz Chavarría">Joselin A. Ortíz Chavarría</option>
                      <option value="Daniel Flores Martínez">Daniel Flores Martínez</option>
                      <option value="Norma Leticia Sánchez Palma">Norma Leticia Sánchez Palma</option>                
                      <option value="Miguel Ángel Pérez Antonio">Miguel Ángel Pérez Antonio</option>
                      <option value="Misael Ortíz Chavarría">Misael Ortíz Chavarría</option>
                      <option value="Nancy Marlene López Barrera">Nancy Marlene López Barrera</option>
                      <option value="Pedro Martínez Reyes">Pedro Martínez Reyes</option>
                      <option value="Olga">Olga</option>
                      <option value="Paola Hernández Hidalgo">Paola Hernández Hidalgo</option>
                      <option value="Patricia Ortíz Arenas">Patricia Ortíz Arenas</option>                
                      <option value="Josefa Martínez Sánchez">Josefa Martínez Sánchez</option>
                      <option value="Roberto Martínez Rodríguez">Roberto Martínez Rodríguez</option>
                      <option value="Rocio Martínez Rodríguez">Rocio Martínez Rodríguez</option>
                      <option value="Roque Chavarría Rodríguez">Roque Chavarría Rodríguez</option>
                      <option value="Sandra Mauricio Najera">Sandra Mauricio Najera</option>                
                      <option value="Vicente Chavarría">Vicente Chavarría</option>
                      <option value="Xochitl Juárez">Xochitl Juárez</option>
                      <option value="Zaira Edith García Reyes">Zaira Edith García Reyes</option>
                      <option value="Beatriz Martínez Velázquez">Beatriz Martínez Velázquez</option>
                      <option value="Velia López Gutiérrez">Velia López Gutiérrez</option>
                      <option value="Raúl Valdéz Duran">Raúl Valdéz Duran</option>
                      <option value="Clemente Chavarría Díaz">Clemente Chavarría Díaz</option>                
                      <option value="Sofia Martínez Rodriguez">Sofia Martínez Rodriguez</option>
                      <option value="Erika Martínez Rodriguez">Erika Martínez Rodriguez</option>
                      <option value="Juan Daniel Ramirez Castro">Juan Daniel Ramirez Castro</option>
                      <option value="Aida Isidro Delgado">Aida Isidro Delgado</option>
                      <option value="Jessica Delgado">Jessica Delgado</option>                
                      <option value="Elizabeth Tafolla">Elizabeth Tafolla</option>
                      <option value="Abigail Rodríguez">Abigail Rodríguez</option>
                      <option value="Daniel Suarez">Daniel Suarez</option>
                      <option value="Citlali Sanchez">Citlali Sanchez</option>
                      <option value="Isela Martínez Rodríguez">Isela Martínez Rodríguez</option>
                      <option value="Erick Alberto Muñoz Fernandez">Erick Alberto Muñoz Fernandez</option>
                      <option value="Ana Rosa Martínez Flores">Ana Rosa Martínez Flores</option>                
                      <option value="Claudia Velázquez Vázquez">Claudia Velázquez Vázquez</option>
                      <option value="Estela Rodríguez Galván">Estela Rodríguez Galván</option>
                      <option value="Viridiana Molina Rodríguez">Viridiana Molina Rodríguez</option>
                      <option value="Kitsia Rojas Diaz">Kitsia Rojas Diaz</option>
                      <option value="Carlos Antonio Hernández">Carlos Antonio Hernández</option>                
                      <option value="Gabriel Chavarría">Gabriel Chavarría</option>
                      <option value="Alberto Rodríguez">Alberto Rodríguez</option>
                      <option value="Julio Cesar Castañon">Julio Cesar Castañon</option>
                      <option value="Saúl Sánchez">Saúl Sánchez</option>
                      <option value="Karina Rodriguez Chavarria">Karina Rodriguez Chavarria</option>
                      <option value="Fabiola Jacome Hernández">Fabiola Jacome Hernández</option>
                      <option value="Nicolás Pérez">Nicolás Pérez</option>                
                      <option value="Remedios Rodriguez">Remedios Rodriguez</option>
                      <option value="Grecia Samantha Jímenez Olivo">Grecia Samantha Jímenez Olivo</option>
                      <option value="Jessica Mitzi Rodriguez Ortiz">Jessica Mitzi Rodriguez Ortiz</option>
                      <option value="Alexia Chavarría Ortíz">Alexia Chavarría Ortíz</option>                
                      <option value="Damaris Juárez Martínez">Damaris Juárez Martínez</option>
                      <option value="Karen Diaz Cruz">Karen Diaz Cruz</option>
                      <option value="Gregorio Rodríguez Martínez">Gregorio Rodríguez Martínez</option>
                      <option value="Juana Verónica Trujillo Cruz">Juana Verónica Trujillo Cruz</option>
                      <option value="Raquel Rivero Ortíz">Raquel Rivero Ortíz</option>                
                      <option value="Maria Cristina Viveros">Maria Cristina Viveros</option>
                      <option value="Luz María Piña Carrillo">Luz María Piña Carrillo</option>
                      <option value="Jessica Velazquez Vega">Jessica Velazquez Vega</option>
                      <option value="Fabiola Rodríguez Escobar">Fabiola Rodríguez Escobar</option>
                      <option value="Fidel Rodriguez Escobar">Fidel Rodriguez Escobar</option>
                      <option value="Marlen Rodriguez Reyes">Marlen Rodriguez Reyes</option>
                      <option value="Edgar Bustamante Rodríguez">Edgar Bustamante Rodríguez</option>     
                      <option value="Janett Morales Chavarría">Janett Morales Chavarría</option>
                      <option value="Rosario Pichardo Olvera">Rosario Pichardo Olvera</option>
                      <option value="Felipe Valente">Felipe Valente</option>                
                      <option value="Monserrat Ortíz">Monserrat Ortíz</option>
                      <option value="Bibliotecario">Bibliotecario</option>
                      <option value="Gisela Ramírez">Gisela Ramírez</option>
                      <option value="Monserrat Cruz Juárez">Monserrat Cruz Juárez</option>
                      <option value="Gustavo Rodríguez">Gustavo Rodríguez</option>                
                      <option value="Oscar Cruz">Oscar Cruz</option>
                      <option value="Rangel Rivero">Rangel Rivero</option>
                      <option value="Mario salazar">Mario salazar</option>
                      <option value="Raquel Martinez">Raquel Martinez</option>
                      <option value="Esmeralda Jaqueline Hernandez Juarez">Esmeralda Jaqueline Hernandez Juarez</option>
                      <option value="Rocio Mauricio Ramírez">Rocio Mauricio Ramírez</option>
                      <option value="Victoriano Rodríguez">Victoriano Rodríguez</option>     
                      <option value="Roberto Rodríguez">Roberto Rodríguez</option>
                      <option value="Kelly Cabrera">Kelly Cabrera</option>
                      <option value="Nayeli Pardinez">Nayeli Pardinez</option>
                      <option value="Cruz Maria Piña">Cruz Maria Piña</option>
                      <option value="Andrea Tellez">Andrea Tellez</option>                
                      <option value="Tlepziba Jaanahi Villeda Barragan">Tlepziba Jaanahi Villeda Barragan</option>
                      <option value="Amalia Ortiz">Amalia Ortiz</option>
                      <option value="Giovana Flores">Giovana Flores</option>
                      <option value="Demetrio Ortiz">Demetrio Ortiz</option>
                      <option value="David Rodriguez">David Rodriguez</option>
                      <option value="Benito Molina">Benito Molina</option>
                      <option value="Alondra Martinez">Alondra Martinez</option>   
                      <option value="Vanessa Verastegui">Vanessa Verastegui</option>
                      <option value="Tamaris Juarez">Tamaris Juarez</option>
                      <option value="Yanet">Yanet</option>
                      <option value="Ericka">Ericka</option>
                      <option value="Fatima Estevez">Fatima Estevez</option>                
                      <option value="Victoria Gonzalez">Victoria Gonzalez</option>
                      <option value="Ajax Rodriguez">Ajax Rodriguez</option>
                      <option value="Colin Esmeralda Monroy">Colin Esmeralda Monroy</option>
                      <option value="Juan Manuel Navarrete">Juan Manuel Navarrete</option>
                      <option value="Yessica Rodriguez">Yessica Rodriguez</option>
                      <option value="Gabriel Santiago">Gabriel Santiago</option>
                      <option value="Evelyn chavarria">Evelyn Chavarria</option>
                      <option value="Abraham Molina">Abraham Molina</option>
                      <option value="Jose Salvador Rodriguez">Jose Salvador Rodriguez</option>
                      <option value="Maria Guadalupe Santillan">Maria Guadalupe Santillan</option>
                     
                  
                </select>  
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <h4>TECNICOS </h4>
                  <select name="tecnico_id" v-model="reporte.nombre_tecnico" id ="nombre_tecnico"  class="form-control" >
                      <option value="Bryan Herrera">Bryan Herrera</option>
                      <option value="Christian">Christian Ruano</option>
                      <option value="Dalia Martinez">Dalia Martinez</option>
                      <option value="Miguel Valles">Miguel Valles</option>
                      <option value="Scarlett Adabell">Scarlett Adabell</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>INFORMACION DEL REPORTE</h4>
                    <select name="reporte_id" v-model="reporte.reporte" id="reporte_id" class="form-control" >
                      <option value="Antivirus">Antivirus</option>
                      <option value="Biométrico">Biométrico</option>
                      <option value="Cableado">Cableado</option>
                      <option value="Entrega de equipo">Entrega de equipo</option>
                      <option value="Entrega de insumos">Entrega de insumos</option>
                      <option value="Impresora">Impresora</option>
                      <option value="Instalación de equipo nuevo">Instalación de equipo nuevo</option>
                      <option value="Instalación de impresora">Instalación de impresora</option>
                      <option value="Conectividad a Internet">Conectividad a Internet</option>
                      <option value="Mantenimiento a computadora">Mantenimiento a computadora</option>
                      <option value="Nodo de red">Nodo de red</option>
                      <option value="Paquetería">Paquetería</option>
                      <option value="Reubicación de equipo">Reubicación de equipo</option>
                      <option value="Solicitud de equipo">Solicitud de equipo</option>
                      <option value="Solicitud de accesorios">Solicitud de accesorios</option>
                      <option value="Solicitud de perifericos">Solicitud de perifericos</option>
                      <option value="Solicitud de insumos">Solicitud de insumos</option>
                      <option value="Switch">Switch</option>
                      <option value="Copiadora">Copiadora</option>
                      <option value="Multifuncional">Multifuncional</option>
                      <option value="Reemplazo de equipo">Reemplazo de equipo</option>
                      <option value="Préstamo de equipo">Préstamo de equipo</option>
                      <option value="Revisión de infraestructura">Revisión de infraestructura</option>
                      <option value="Revisión de servicios">Revisión de servicios</option>
                      <option value="Solicitud de mantenimiento">Solicitud de mantenimiento</option>
                      <option value="Entrega e instalacion de tintas o tóner">Entrega e instalacion de tintas o tóner</option>
                      <option value="Canaleta y cajas externas para nodos">Canaleta y cajas externas para nodos</option>
                      <option value="Respaldo de información">Respaldo de información</option>
                      <option value="Bloqueo de redes sociales">Bloqueo de redes sociales</option>
                      <option value="Desinstalación e instalación de software">Desinstalación e instalación de software</option>
                      <option value="Scanner">Scanner</option>
                      <option value="Análisis de memoria">Análisis de memoria</option>
                      <option value="Asistencia">Asistencia</option>
                      <option value="Mantenimiento de software de paquetería">Mantenimiento de software de paquetería</option>
                      <option value="Instalación y configuración de router">Instalación y configuración de router</option>
                      <option value="Mantenimiento de software - sistema operativo">Mantenimiento de software - sistema operativo</option>
                      <option value="Configuración para impresión en recurso compartido ">Configuración para impresión en recurso compartido </option>
                      <option value="Recorrido general">Recorrido general</option>
                      <option value="Servicio Técnico-Mantenimiento físico">Servicio Técnico-Mantenimiento físico</option>
                      <option value="Entrega de carta">Entrega de carta</option>
                      <option value="Reseteo de acceso de equipo">Reseteo de acceso de equipo</option>
                      <option value="Instalación de tuberia tipo conduit">Instalación de tuberia tipo conduit</option>
                      <option value="Suministro e instalación de cableado UTP">Suministro e instalación de cableado UTP</option>
                      <option value="Niveles de tinta">Niveles de tinta</option>
                      <option value="Licencias">Licencias</option>
                      <option value="Suministro e instalación de nodo de red">Suministro e instalación de nodo de red</option>
                  </select>
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
                  <h4>FECHA INICIAL </h4>
                  <input type="datetime-local" v-model="reporte.feyhora" id="feyhora">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>FECHA FINAL</h4>
                  <input type="datetime-local" v-model="reporte.feyhorafinal" id="feyhorafinal">
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
                 <!----<input ref="upload"
                                type="file"
                                name="file-upload"
                                multiple=""
                                accept="image/jpeg, image/png, image/jpg"
                                @change="asignaArchivo">
                </div>
       </div>
                <div class="col-md-6">
                  <img :src='url' width="150px">
                </div>-->
                </div>
                </div>
                
                <div class="row">         
                <div class="col-md-6">
                <div class="form-group">
                  <h4>AREAS </h4>
                    <select name="area_id" v-model="reporte.nombre_area" id ="nombre_area"  class="form-control">
                      <option value="" selected disabled hidden>Choose here</option>
                      <option value="Administración">Administración</option>
                      <option value="Agua Potable, Drenaje Y Alcantarillado">Agua Potable, Drenaje Y Alcantarillado</option>
                      <option value="Anticorrupción">Anticorrupción</option>
                      <option value="Contraloria">Contraloria</option>
                      <option value="Catastro">Catastro</option>
                      <option value="Archivo Municipal">Archivo Municipal</option>                
                      <option value="Biblioteca">Biblioteca</option>
                      <option value="Biblioteca Digital">Biblioteca Digital</option>
                      <option value="Desarrollo y Bienestar Social">Desarrollo y Bienestar Social</option>
                      <option value="Derechos Humanos">Derechos Humanos</option>
                      <option value="Desarrollo Urbano">Desarrollo Urbano</option>
                      <option value="DIF">DIF</option>
                      <option value="Ecología y Medio Ambiente">Ecología y Medio Ambiente</option>
                      <option value="Educación y Cultura">Educación y Cultura</option>
                      <option value="IMCUFIDET">IMCUFIDET</option>
                      <option value="Juridico">Jurídico</option>
                      <option value="Obras Publicas">Obras Publicas</option>
                      <option value="Oficialia">Oficialia Calificadora</option>
                      <option value="Bomberos">Protección Civil y Bomberos</option>
                      <option value="Presidencia">Presidencia</option>                
                      <option value="Salud Municipal">Salud Municipal</option>
                      <option value="Secretaria del Ayuntamiento">Secretaria del Ayuntamiento</option>
                      <option value="Secretaria Técnica">Secretaria Técnica de Seguridad Publica</option>
                      <option value="Seguridad Publica">Seguridad publica</option>
                      <option value="Servicios Publicos">Servicios Publicos</option>
                      <option value="Sindicatura">Sindicatura</option>
                      <option value="Tesoreria">Tesoreria</option>
                      <option value="Regiduria">Regidurias</option>
                      <option value="Registro Civil">Registro Civil</option>
                      <option value="UIPPE">UIPPE</option>
                      <option value="Unidad de Transparencia/Consulta Ciudadana">Unidad de Transparencia/Consulta Ciudadana</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>NOMBRE DEL CLIENTE </h4>
                    <select name="cliente_id" v-model="reporte.nombre_cliente" id="nombre_cliente" class="form-control" >

                      <option value="Alexandra López Mauricio">Alexandra López Mauricio</option>
                      <option value="Angel Rivas">Angel Rivas</option>
                      <option value="Ángeles Chavarría Rodríguez">Ángeles Chavarría Rodríguez</option>
                      <option value="Araceli Carmona Cruz">Araceli Carmona Cruz</option>
                      <option value="Arantxa Aldana Hernández">Arantxa Aldana Hernández</option>
                      <option value="Benito Medina Martínez">Benito Medina Martínez</option>                
                      <option value="Inés Acosta Ortega">Inés Acosta Ortega</option>
                      <option value="Claudia Rodríguez Rodríguez">Claudia Rodríguez Rodríguez</option>
                      <option value="Denisse Ortíz Hernández">Denisse Ortíz Hernández</option>
                      <option value="Doroteo Rodríguez">Doroteo Rodríguez</option>
                      <option value="Dr. Juan Martínez Rodríguez">Dr. Juan Martínez Rodríguez</option>
                      <option value="Gilberto Suárez Lozano">Gilberto Suárez Lozano</option>
                      <option value="Guadalupe Huerta González">Guadalupe Huerta González</option>                
                      <option value="Guadalupe García Torres">Guadalupe García Torres</option>
                      <option value="Guadalupe Martínez Rodríguez">Guadalupe Martínez Rodríguez</option>
                      <option value="Jazmin Barrera Ortega">Jazmin Barrera Ortega</option>
                      <option value="Jorge Vargas Vázquez">Jorge Vargas Vázquez</option>
                      <option value="Joselin A. Ortíz Chavarría">Joselin A. Ortíz Chavarría</option>
                      <option value="Daniel Flores Martínez">Daniel Flores Martínez</option>
                      <option value="Norma Leticia Sánchez Palma">Norma Leticia Sánchez Palma</option>                
                      <option value="Miguel Ángel Pérez Antonio">Miguel Ángel Pérez Antonio</option>
                      <option value="Misael Ortíz Chavarría">Misael Ortíz Chavarría</option>
                      <option value="Nancy Marlene López Barrera">Nancy Marlene López Barrera</option>
                      <option value="Pedro Martínez Reyes">Pedro Martínez Reyes</option>
                      <option value="Olga">Olga</option>
                      <option value="Paola Hernández Hidalgo">Paola Hernández Hidalgo</option>
                      <option value="Patricia Ortíz Arenas">Patricia Ortíz Arenas</option>                
                      <option value="Josefa Martínez Sánchez">Josefa Martínez Sánchez</option>
                      <option value="Roberto Martínez Rodríguez">Roberto Martínez Rodríguez</option>
                      <option value="Rocio Martínez Rodríguez">Rocio Martínez Rodríguez</option>
                      <option value="Roque Chavarría Rodríguez">Roque Chavarría Rodríguez</option>
                      <option value="Sandra Mauricio Najera">Sandra Mauricio Najera</option>                
                      <option value="Vicente Chavarría">Vicente Chavarría</option>
                      <option value="Xochitl Juárez">Xochitl Juárez</option>
                      <option value="Zaira Edith García Reyes">Zaira Edith García Reyes</option>
                      <option value="Beatriz Martínez Velázquez">Beatriz Martínez Velázquez</option>
                      <option value="Velia López Gutiérrez">Velia López Gutiérrez</option>
                      <option value="Raúl Valdéz Duran">Raúl Valdéz Duran</option>
                      <option value="Clemente Chavarría Díaz">Clemente Chavarría Díaz</option>                
                      <option value="Sofia Martínez Rodriguez">Sofia Martínez Rodriguez</option>
                      <option value="Erika Martínez Rodriguez">Erika Martínez Rodriguez</option>
                      <option value="Juan Daniel Ramirez Castro">Juan Daniel Ramirez Castro</option>
                      <option value="Aida Isidro Delgado">Aida Isidro Delgado</option>
                      <option value="Jessica Delgado">Jessica Delgado</option>                
                      <option value="Elizabeth Tafolla">Elizabeth Tafolla</option>
                      <option value="Abigail Rodríguez">Abigail Rodríguez</option>
                      <option value="Daniel Suarez">Daniel Suarez</option>
                      <option value="Citlali Sanchez">Citlali Sanchez</option>
                      <option value="Isela Martínez Rodríguez">Isela Martínez Rodríguez</option>
                      <option value="Erick Alberto Muñoz Fernandez">Erick Alberto Muñoz Fernandez</option>
                      <option value="Ana Rosa Martínez Flores">Ana Rosa Martínez Flores</option>                
                      <option value="Claudia Velázquez Vázquez">Claudia Velázquez Vázquez</option>
                      <option value="Estela Rodríguez Galván">Estela Rodríguez Galván</option>
                      <option value="Viridiana Molina Rodríguez">Viridiana Molina Rodríguez</option>
                      <option value="Kitsia Rojas Diaz">Kitsia Rojas Diaz</option>
                      <option value="Carlos Antonio Hernández">Carlos Antonio Hernández</option>                
                      <option value="Gabriel Chavarría">Gabriel Chavarría</option>
                      <option value="Alberto Rodríguez">Alberto Rodríguez</option>
                      <option value="Julio Cesar Castañon">Julio Cesar Castañon</option>
                      <option value="Saúl Sánchez">Saúl Sánchez</option>
                      <option value="Karina Rodriguez Chavarria">Karina Rodriguez Chavarria</option>
                      <option value="Fabiola Jacome Hernández">Fabiola Jacome Hernández</option>
                      <option value="Nicolás Pérez">Nicolás Pérez</option>                
                      <option value="Remedios Rodriguez">Remedios Rodriguez</option>
                      <option value="Grecia Samantha Jímenez Olivo">Grecia Samantha Jímenez Olivo</option>
                      <option value="Jessica Mitzi Rodriguez Ortiz">Jessica Mitzi Rodriguez Ortiz</option>
                      <option value="Alexia Chavarría Ortíz">Alexia Chavarría Ortíz</option>                
                      <option value="Damaris Juárez Martínez">Damaris Juárez Martínez</option>
                      <option value="Karen Diaz Cruz">Karen Diaz Cruz</option>
                      <option value="Gregorio Rodríguez Martínez">Gregorio Rodríguez Martínez</option>
                      <option value="Juana Verónica Trujillo Cruz">Juana Verónica Trujillo Cruz</option>
                      <option value="Raquel Rivero Ortíz">Raquel Rivero Ortíz</option>                
                      <option value="Maria Cristina Viveros">Maria Cristina Viveros</option>
                      <option value="Luz María Piña Carrillo">Luz María Piña Carrillo</option>
                      <option value="Jessica Velazquez Vega">Jessica Velazquez Vega</option>
                      <option value="Fabiola Rodríguez Escobar">Fabiola Rodríguez Escobar</option>
                      <option value="Fidel Rodriguez Escobar">Fidel Rodriguez Escobar</option>
                      <option value="Marlen Rodriguez Reyes">Marlen Rodriguez Reyes</option>
                      <option value="Edgar Bustamante Rodríguez">Edgar Bustamante Rodríguez</option>     
                      <option value="Janett Morales Chavarría">Janett Morales Chavarría</option>
                      <option value="Rosario Pichardo Olvera">Rosario Pichardo Olvera</option>
                      <option value="Felipe Valente">Felipe Valente</option>                
                      <option value="Monserrat Ortíz">Monserrat Ortíz</option>
                      <option value="Bibliotecario">Bibliotecario</option>
                      <option value="Gisela Ramírez">Gisela Ramírez</option>
                      <option value="Monserrat Cruz Juárez">Monserrat Cruz Juárez</option>
                      <option value="Gustavo Rodríguez">Gustavo Rodríguez</option>                
                      <option value="Oscar Cruz">Oscar Cruz</option>
                      <option value="Rangel Rivero">Rangel Rivero</option>
                      <option value="Mario salazar">Mario salazar</option>
                      <option value="Raquel Martinez">Raquel Martinez</option>
                      <option value="Esmeralda Jaqueline Hernandez Juarez">Esmeralda Jaqueline Hernandez Juarez</option>
                      <option value="Rocio Mauricio Ramírez">Rocio Mauricio Ramírez</option>
                      <option value="Victoriano Rodríguez">Victoriano Rodríguez</option>     
                      <option value="Roberto Rodríguez">Roberto Rodríguez</option>
                      <option value="Kelly Cabrera">Kelly Cabrera</option>
                      <option value="Nayeli Pardinez">Nayeli Pardinez</option>
                      <option value="Cruz Maria Piña">Cruz Maria Piña</option>
                      <option value="Andrea Tellez">Andrea Tellez</option>                
                      <option value="Tlepziba Jaanahi Villeda Barragan">Tlepziba Jaanahi Villeda Barragan</option>
                      <option value="Amalia Ortiz">Amalia Ortiz</option>
                      <option value="Giovana Flores">Giovana Flores</option>
                      <option value="Demetrio Ortiz">Demetrio Ortiz</option>
                      <option value="David Rodriguez">David Rodriguez</option>
                      <option value="Benito Molina">Benito Molina</option>
                      <option value="Alondra Martinez">Alondra Martinez</option>   
                      <option value="Vanessa Verastegui">Vanessa Verastegui</option>
                      <option value="Tamaris Juarez">Tamaris Juarez</option>
                      <option value="Yanet">Yanet</option>
                      <option value="Ericka">Ericka</option>
                      <option value="Fatima Estevez">Fatima Estevez</option>                
                      <option value="Victoria Gonzalez">Victoria Gonzalez</option>
                      <option value="Ajax Rodriguez">Ajax Rodriguez</option>
                      <option value="Colin Esmeralda Monroy">Colin Esmeralda Monroy</option>
                      <option value="Juan Manuel Navarrete">Juan Manuel Navarrete</option>
                      <option value="Yessica Rodriguez">Yessica Rodriguez</option>
                      <option value="Gabriel Santiago">Gabriel Santiago</option>
                      <option value="Evelyn chavarria">Evelyn Chavarria</option>
                      <option value="Abraham Molina">Abraham Molina</option>
                      <option value="Jose Salvador Rodriguez">Jose Salvador Rodriguez</option>
                      <option value="Maria Guadalupe Santillan">Maria Guadalupe Santillan</option>

                    </select>  
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <h4>TECNICOS </h4>
                  <select name="tecnico_id" v-model="reporte.nombre_tecnico" id ="nombre_tecnico"  class="form-control" >
                      <option value="Bryan Herrera">Bryan Herrera</option>
                      <option value="Christian">Christian Ruano</option>
                      <option value="Dalia Martinez">Dalia Martinez</option>
                      <option value="Miguel Valles">Miguel Valles</option>
                      <option value="Scarlett Adabell">Scarlett Adabell</option>

                
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>INFORMACION DEL REPORTE</h4>
                  <select name="reporte_id" v-model="reporte.reporte" id="reporte_id" class="form-control" >
                      <option value="Antivirus">Antivirus</option>
                      <option value="Biométrico">Biométrico</option>
                      <option value="Cableado">Cableado</option>
                      <option value="Entrega de equipo">Entrega de equipo</option>
                      <option value="Entrega de insumos">Entrega de insumos</option>
                      <option value="Impresora">Impresora</option>
                      <option value="Instalación de equipo nuevo">Instalación de equipo nuevo</option>
                      <option value="Instalación de impresora">Instalación de impresora</option>
                      <option value="Conectividad a Internet">Conectividad a Internet</option>
                      <option value="Mantenimiento a computadora">Mantenimiento a computadora</option>
                      <option value="Nodo de red">Nodo de red</option>
                      <option value="Paquetería">Paquetería</option>
                      <option value="Reubicación de equipo">Reubicación de equipo</option>
                      <option value="Solicitud de equipo">Solicitud de equipo</option>
                      <option value="Solicitud de accesorios">Solicitud de accesorios</option>
                      <option value="Solicitud de perifericos">Solicitud de perifericos</option>
                      <option value="Solicitud de insumos">Solicitud de insumos</option>
                      <option value="Switch">Switch</option>
                      <option value="Copiadora">Copiadora</option>
                      <option value="Multifuncional">Multifuncional</option>
                      <option value="Reemplazo de equipo">Reemplazo de equipo</option>
                      <option value="Préstamo de equipo">Préstamo de equipo</option>
                      <option value="Revisión de infraestructura">Revisión de infraestructura</option>
                      <option value="Revisión de servicios">Revisión de servicios</option>
                      <option value="Solicitud de mantenimiento">Solicitud de mantenimiento</option>
                      <option value="Entrega e instalacion de tintas o tóner">Entrega e instalacion de tintas o tóner</option>
                      <option value="Canaleta y cajas externas para nodos">Canaleta y cajas externas para nodos</option>
                      <option value="Respaldo de información">Respaldo de información</option>
                      <option value="Bloqueo de redes sociales">Bloqueo de redes sociales</option>
                      <option value="Desinstalación e instalación de software">Desinstalación e instalación de software</option>
                      <option value="Scanner">Scanner</option>
                      <option value="Análisis de memoria">Análisis de memoria</option>
                      <option value="Asistencia">Asistencia</option>
                      <option value="Mantenimiento de software de paquetería">Mantenimiento de software de paquetería</option>
                      <option value="Instalación y configuración de router">Instalación y configuración de router</option>
                      <option value="Mantenimiento de software - sistema operativo">Mantenimiento de software - sistema operativo</option>
                      <option value="Configuración para impresión en recurso compartido ">Configuración para impresión en recurso compartido </option>
                      <option value="Recorrido general">Recorrido general</option>
                      <option value="Servicio Técnico-Mantenimiento físico">Servicio Técnico-Mantenimiento físico</option>
                      <option value="Entrega de carta">Entrega de carta</option>
                      <option value="Reseteo de acceso de equipo">Reseteo de acceso de equipo</option>
                      <option value="Instalación de tuberia tipo conduit">Instalación de tuberia tipo conduit</option>
                      <option value="Suministro e instalación de cableado UTP">Suministro e instalación de cableado UTP</option>
                      <option value="Niveles de tinta">Niveles de tinta</option>
                      <option value="Licencias">Licencias</option>
                      <option value="Suministro e instalación de nodo de red">Suministro e instalación de nodo de red</option>
                  </select>
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
                  <h4>FECHA INICIAL </h4>
                  <input type="datetime-local" v-model="reporte.feyhora" id="feyhora">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <h4>FECHA FINAL</h4>
                  <input type="datetime-local" v-model="reporte.feyhorafinal" id="feyhorafinal">
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
                let nombreCliente = document.getElementsByName("buscarporNombre")[0].value,
                    nombreArea = document.getElementsByName("buscarporArea")[0].value,
                    Fecha = document.getElementsByName("buscarporFecha")[0].value,
                    FechaF = document.getElementsByName("buscarporFechaF")[0].value;



                axios.get('api/reportes/lista',  { params: { 
                    buscarporNombre: nombreCliente,
                    buscarporArea: nombreArea,
                    buscarporFecha: Fecha,
                    buscarporFechaF: FechaF,
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

                  //formData.append("id", this.reporte.id)
                  formData.append("nombre_area", this.reporte.nombre_area)
                  formData.append("nombre_cliente", this.reporte.nombre_cliente)
                  formData.append("nombre_tecnico", this.reporte.nombre_tecnico)
                  formData.append("reporte", this.reporte.reporte)
                  formData.append("feyhora", this.reporte.feyhora)
                  formData.append("estado", this.reporte.estado)
                  formData.append("feyhorafinal", this.reporte.feyhorafinal)


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
                 

                  formData.append("id", this.reporte.id)
                  formData.append("nombre_area", this.reporte.nombre_area)
                  formData.append("nombre_cliente", this.reporte.nombre_cliente)
                  formData.append("nombre_tecnico", this.reporte.nombre_tecnico)
                  formData.append("reporte", this.reporte.reporte)
                  formData.append("feyhora", this.reporte.feyhora)
                  formData.append("estado", this.reporte.estado)
                  formData.append("feyhorafinal", this.reporte.feyhorafinal)


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

