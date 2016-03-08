@extends('app')

@section('content')


<div class="row">

			<div class="from-group col-lg-4 col-lg-offset-2">
				 <!--Mensaje-->
				@if (Session::has('flash_message'))
	   			 <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
				@endif
				<!--Mensaje-->
				

				 <form action="{{ route('rubroEditStore') }}" method="post">
				 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				 	<label for="nombre">NOMBRE</label><br>
				 	<input type="hidden" value="<?php echo $datos[0]->idRubro; ?>" name="idRubro" >
				 	<input type="text" class="form-control" value="<?php echo $datos[0]->nombre; ?>" title="Ingrese Nombre Rubro" name="nombre" required/><br>

				 	<input type="submit" class="btn btn-default" value="ACEPTAR">

				   


				 </form>
			</div>

</div>

 @endsection