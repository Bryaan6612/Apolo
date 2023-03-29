
<style type="text/css" media="screen">
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


</style>








<style type="text/css" media="screen">

*{
  margin: 0;
  padding: 0;
}
.intro{
  margin: auto;
}


.white{
  width: 50%;
  float: right;

  height: 100vh;
}


.box{
  height: 400px;
  width: 800px;

  position:absolute;
  top:150px;
  left:0;
  right:0;
  margin:auto;
  border-radius:20px;
}

.boxfather{
  width:100%;
  position:absolute;
}
.box h1{
  color: #E4E4E4;
  font-size: 2em;
  text-align: center;
  position: relative;
  top:70px;
  font-family: 'Montserrat', sans-serif;
}



.homepage{
  height: 100vh;
  position:relative;
  top:40px;
  bottom:60px;
  
 
}
.homepage p{
  width: 80%;
  line-height: 1.5;
  margin:50px auto;
  font-family: oxygen;
  font-size: 18px;
  color: #585858;
}
.homepage h1{
  padding-top: 50px;
  width: 10%;
  margin:auto;
  font-family: montserrat;
  color: #525252;
  font-size: 10px;
}

</style>


<!-- This demo is inspired by the awesome nurturedigital website created by Bryan James. You can view it at http://nurturedigital.com -->

<link rel="shortcat icon" href="images/favicon.jpg"> 
<div class="wrapper full-size">
	<!-- This div handle the background color -->
	<div class="mask-bg-color full-size">
	</div>
	<!-- This div  wrap all other elements with blend-mode multiply apply -->
	<div class="blend-multiply full-size">	
		<!-- This div handle the background element (could be an image, a video or in that case a gif) -->
		<div class="animated-bg full-size">
		</div>
        <!-- This div wrap the masked element with blend-mode screen apply and background-color set as #ffffff = white background -->
		<div class="blend-screen element-mask full-size">
			<!-- This span display the masked element-->
			<span id="circle" class="circle-follow">
			</span>
		</div>
	</div>
</div>





@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

@endsection

<div class="intro">
  <div class="black"></div>  
  <div class="white"></div>
  <div class="boxfather">
    <div class="box">
      <h1>BIENVENIDO A APOLO </h1> 
      <BR>
      <h1>SISTEMA GESTOR DE REPORTES Y ACTIVIDADES</h1> 
      <BR>
      <h1> ✎ 📑 </h1> 

  
    </div>
  </div>
  
</div>


@push('js')
<script>

jQuery(document).ready(function($) {

// set the variables
var timer;
var mouseX = 0, mouseY = 0;
var xp = 0, yp =0;
var circle = $("#circle");

function mouseStopped(){    
    // if mouse stop moving remove class moving 
    // it will hide the circle with opacity transition                           
    circle.removeClass('moving');
}

$(document).mousemove(function(e){
    // if mouse start moving add class moving
    // it will show the circle with opacity transition 
    circle.addClass('moving');
    // get the mouse position minus 160px to center the circle
    mouseX = e.pageX - 160;
    mouseY = e.pageY - 160; 
    // if mouse stop moving clear timer and call mouseStopped function
    clearTimeout(timer);
    timer=setTimeout(mouseStopped,3000);   
});

// set the momentum with setInterval function
var loop = setInterval(function(){
   // change 12 to alter damping higher is slower
   xp += ((mouseX - xp)/6);
   yp += ((mouseY - yp)/6);
   circle.css({left: xp +'px', top: yp +'px'});  // 
}, 30);

});


</script>
@endpush




