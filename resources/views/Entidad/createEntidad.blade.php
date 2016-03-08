@extends('app')

@section('content')


<div class="row">

			<div class="from-group col-lg-4 col-lg-offset-2">
				 <!--Mensaje-->
				@if (Session::has('flash_message'))
	   			 <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
				@endif
				<!--Mensaje-->
				

				 <form role="form" action="{{ route('storeEntidad') }}" method="post">
				  <div class="form-group">
				 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				 	<label for="nombre">NOMBRE</label><br>
				 	<input class="form-control" type="text" name="nombre" placeholder="Nombre Entidad" title="Ingrese Nombre" required/><br>
					<label for="nombre">SIGLA</label><br>
				 	<input class="form-control" type="text" name="sigla" placeholder="Sigla Entidad" title="Ingrese Sigla" /><br>
				 	<input type="submit" class="btn btn-default" size="300" value="CREAR">
				</div>
				   


				 </form>
			</div>
			
</div>

 @endsection