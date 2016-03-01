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
				    <label for="razonSocial">Razon Social:</label>
				    <input type="text" class="form-control" name="razonSocial">
				  </div>

				  <div class="form-group">
				    <label for="direccion">Direccion:</label>
				    <input type="text" class="form-control" name="direccion">
				  </div>
				  <div class="form-group">
				    <label for="provincia">Provincia:</label>
				    <select  class="form-control" name="provincia" id="provincia">
					<?php

						foreach($provincias as $provincia){

								echo "<option value='{$provincia->idProvincia}'>{$provincia->nombre}</option>";
						}

					?>

				    </select>
				  </div>

					<div class="form-group">
				    <label for="ciudad">Ciudad:</label>
				    <select  class="form-control" name="ciudad" id="ciudad">
							<?php

						foreach($ciudades as $ciudad){

								echo "<option value='{$ciudad->idCiudad}'>{$ciudad->nombre}</option>";
						}

					?>

				

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


				  <div class="form-group">
				    <label for="estado">Estado:</label>
				    <input type="checkbox" name="vehicle" value="Activo">Activo

				  </div>

				  <div class="form-group">
				    <label for="entidad">Fotos:</label>
				    <input class="btn btn-warning" name="fotos[]" type="file" multiple/>

				  </div>


					
					
				

					

				  
				  <button type="submit" class="btn btn-primary">Registrar</button>
				
				
			</div>
				</form>

</div>

<!--script-->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>

<script src="{{URL::asset('js/bootstrap.js')}}"></script>


<script>

$('select#provincia').on('change',function(){
   var valor = $(this).val();
   // alert(valor);
//});
 
	//jQuery.post("ajax",{ 'valor': valor  }, function(data){
								
																//});



       var parametros = {
               "valor" : valor,
                
        };
        $.ajax({
                data:  parametros,
                url:   'ajaxCiudad',
                type:  'get',
               beforeSend: function () {
                        $('#ciudad').append('<option  selected="selected">cargando...</option>');
                },
                success:  function (response) {
                	$('#ciudad').find('option').remove().end();//elimina los option que se cargan por default;

                	//console.log(response);

                 //$("#resultado").html(response);
                  //host=window.location+'/'+response;


                 //alert(host);

               //window.location=host;

               var cant=response.length;//obtengo la cantidad
               var i;

               	for(i=0;i<cant;i++){


               		$('#ciudad').append('<option value="'+response[i]['idCiudad']+'" selected="selected">'+response[i]['nombre']+'</option>');

               //console.log(cant);
               //console.log(response[0]['idCiudad']);

               	}





                }
        });



});//cierra funcion principal//


































</script>


</body>

</html>
