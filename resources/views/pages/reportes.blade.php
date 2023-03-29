@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-dark pb-8 pt-5 pt-md-4">
        <div class="container-fluid">
            <div class="header-body">
           
            </div>
        </div>
    </div>

<!-- Page content -->
<div class="container-fluid mt--5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-2">
            <h3 class="mb-1">REPORTES</h3>
          </div>

          <!--<div class="container-fluid mt--8">
          <form action="{{ url('reportes.index') }}" method="GET">
            <div class="form-row">
          <div class="col-sm-4 my-1">
          <input type="text"  name="busqueda" class="form-control" placeholder="Buscador" >
          </div>
          <div class="col-auto my-1">
          <input type="submit" value="enviar" class="btn btn-second">
          </div>
</div>
        </div>-->

    
        <nav class="navbar navbar-light justify-content-between">
          <form class="form-inline" action="{{route('reportes.listar')}}" method="GET">
            <input name="buscarpor"  class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <input name="buscarporArea" class="form-control mr-sm-2" type="search" placeholder="Buscar por area" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>


          <reportes-component />
          
        </div>
        
      </div>
   
    </div>
    
@endsection