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

							<span>RUBROS</span>
							<a style="float:right;margin-right:20px" href="{{ url('crearRubro')}}">Agregar Rubro</a>
							
						</div>



						<thead>

						
							 <tr>
					             <td>ID</td>
							 	<td>NOMBRE</td>
							 	<td align="center">OPCIONES</td>
							 	
							 </tr>



						</thead>

						<tbody>
							  
							  <?php
							  		foreach($rubros as $rubro){
					                 
					                 echo "<tr>";

					                 echo"<td>".$rubro->idRubro."</td>";
					                 echo"<td>".$rubro->nombre."</td>";
					                 
					                 echo"<td><a href='".route("rubroEdit",$rubro->idRubro)."'><i class='glyphicon glyphicon-pencil'></i></a></td>";
					                 echo"<td><a href='".route("rubroDelete",$rubro->idRubro)."'><i class='glyphicon glyphicon-remove'></i></a></td>";


					                 echo"</tr>";



							  		}




							  ?>

					      




						</tbody>




					</table>

			</div>


</div>




@endsection