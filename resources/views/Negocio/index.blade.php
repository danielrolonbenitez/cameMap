<html>
<head>
<link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
</head>

<body>


<div class="row">
				
			<div  class="col-lg-4 col-lg-offset-2 loginForm">
				<form id="pepe" action="{{ action('LoginController@validaUser')}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group">
				  			<label >NEGOCIO</label>
					</div>

				  <div class="form-group">
				  
				    <label for="nombre">Nombre:</label>
				    <input type="text" class="form-control" name="nombre">
				  </div>


				  <div class="form-group">
				    <label for="razonSocial">Razon Social:</label>
				    <input type="text" class="form-control" name="razonSocial">
				  </div>

				  <div class="form-group">
				    <label for="direccion">Direccion:</label>
				    <input type="text" class="form-control" name="direccion">
				  </div>
				  <div class="form-group">
				    <label for="provincia">Provincia:</label>
				    <select  class="form-control" name="provincia">
					<option></option>

				    </select>
				  </div>

					<div class="form-group">
				    <label for="ciudad">Ciudad:</label>
				    <select  class="form-control" name="ciudad">
							
							<option></option>

					</select>

				  </div>
					
				<div class="form-group">
				    <label for="sitioWeb">Sitio Web:</label>
				    <input type="text" class="form-control" name="sitioWeb">
				  </div>


				<div class="form-group">
				    <label for="telefono">Telefono:</label>
				    <input type="text" class="form-control" name="telefono">

				  </div>

				<div class="form-group">
				    <label for="rubro">Rubro:</label>
				    <input type="text" class="form-control" name="rubro">

				  </div>


				  <div class="form-group">
				    <label for="entidad">Entidad:</label>
				    <input type="text" class="form-control" name="entidad">

				  </div>




				  
				  <button type="submit" class="btn btn-primary">Registrar</button>
				
				
				</form>
			</div>

</div>

<!--script-->

<script scr="{{URL::asset('js/bootstrap.css')}}"></script>





</body>

</html>
