@extends('app')
@section('content')


 <div class="row">
			<div class="col-lg-4 col-lg-offset-2">
			

				      <!--mensaje-->
								@if (Session::has('flash_message'))
						   			 <div class="alert alert-info">
						   			 	<button type="button" class="close" data-dismiss="alert">&times;</button>
						   			 	{{ Session::get('flash_message') }}

						   			 </div>
								@endif
					<!--end mesanje-->



					<table class="table table-striped">
						<div style="background:silver;padding:10px">

							<span>ENTIDADES</span>
							<a style="float:right;margin-right:20px" href="{{ url('crearEntidad')}}">Agregar Entidad</a>
							
						</div>



						<thead>

						
							 <tr>
					             <td>ID</td>
							 	<td>NOMBRE</td>
							 	<td>SIGLA</td>
							 	<td align="center">OPCIONES</td>
							 	
							 </tr>



						</thead>

						<tbody>
							  
							  <?php
							  		foreach($entidades as $entidad){
					                 
					                 echo "<tr>";

					                 echo"<td>".$entidad->idEntidad."</td>";
					                 echo"<td>".$entidad->nombre."</td>";
					                 echo"<td>".$entidad->sigla."</td>";
					                 

					                 echo"<td><a href='".route("entidadEdit",$entidad->idEntidad)."'><i class='glyphicon glyphicon-pencil'></i></a></td>";
					                 echo"<td><a href='".route("entidadDelete",$entidad->idEntidad)."'><i class='glyphicon glyphicon-remove'></i></a></td>";


					                 echo"</tr>";



							  		}




							  ?>

					      




						</tbody>




					</table>

			</div>


</div>




@endsection