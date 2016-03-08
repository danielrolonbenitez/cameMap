@extends('app')

@section('content')


<div class="row">

			<div class="from-group col-lg-4 col-lg-offset-2">
				 <!--Mensaje-->
				@if (Session::has('flash_message'))
	   			 <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
				@endif
				<!--Mensaje-->
				

				 <form action="{{ route('storeRubro') }}" method="post">
				 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				 	<label for="nombre">NOMBRE</label><br>
				 	<input type="text" class="form-control" name="nombre" placeholder="Nombre Rubro" title="Ingrese Nombre Rubro" required/><br>

				 	<input type="submit" class="btn btn-default" value="CREAR">

				   


				 </form>
			</div>

</div>

 @endsection