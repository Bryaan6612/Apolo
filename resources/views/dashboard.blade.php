<style type="text/css" media="screen">

/* HEADER */
.header {
    position: relative;
    
    overflow: hidden;
    
    margin: 0 0 2vw;
    padding: 8vw 2vw 78vw;
 
    
    &::before, &::after {
        content: "";
        
        position: absolute;
        bottom: 0;
        left: 0;
        
        width: 140%;
        height: 100%;
       
        background: #fff;
        transform-origin: top left; 
    }  
    
    &::before {
        transform: translate3d(0, 70%, 0) rotate(12deg);
        
        opacity: .1;
    }
    
    &::after {
        transform: translate3d(0, 100%, 0) rotate(-12deg);
    }
}


h1::before {  
  transform: scaleX(0);
  transform-origin: bottom right;
}

h1:hover::before {
  transform: scaleX(1);
  transform-origin: bottom left;
}

h1::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  inset: 0 0 0 0;
  background: hsl(35 20% 10%);
  z-index: -1;
  transition: transform .3s ease;
}

h1 {
  position: relative;
  font-size: 5rem;
}


@media (orientation: landscape) {
  body {
    grid-auto-flow: column;
  }
}


.header__title {
    font-size: 3vw;
    font-weight: normal;
    line-height: 1.3;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: .2em;
    
    text-shadow: 0 1px 0 rgba(242, 61, 121, 1);
} 

.header__intro {
    font-size: 2vw;
    line-height: 1.5;
    color: #fff;
    
    text-shadow: 0 1px 0 rgba(242, 61, 121, 1);
}



/* CONTENT */
.content {
    font-size: 2vw;
    margin: 0 0 4vw;
    padding: 6em;
}





</style>

@extends('layouts.app')

@section('content')
    




<header class="header">
    <h1 class="header__title">
       SELECCIONA ALGUNA OPCIÓN 
    </h1>
    <p class="header__TITLE">
    DE NUESTRO MENÚ  🔍<br> 
    </p>
    <p class="header__intro">
      <br> 
    </p>
</header>



 
@endsection









@push('js')

<script> 

</script>

   
@endpush