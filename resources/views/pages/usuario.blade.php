@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-dark pb-8 pt-5 pt-md-4">
        <div class="container-fluid">
            <div class="header-body">
           
            </div>
        </div>
    </div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Usuarios</h3>
          </div>
          <usuario-component />
        </div>
      </div>
    </div>
@endsection