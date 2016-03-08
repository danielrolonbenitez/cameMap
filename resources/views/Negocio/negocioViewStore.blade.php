@extends('app')

@section('content')
	<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
 
				<form  class="" role="form"   id="negocioForm" action="{{route('negocioStore')}}" method="POST" enctype="multipart/form-data" style="margin-left:25%">
								
				<div class="row"> 
                                             
									<div class="col-lg-4">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
												<input type="hidden" name="latitud" id="latitud" value="" />
												<input type="hidden" name="longitud" id="longitud" value="" />
											 

							
											    <label for="razonSocial">Razon Social:</label><br>
											    <input type="text" class="form-control" name="razonSocial" id="razonSocial"><br>
											  
											    <label for="direccion">Direccion:</label><br>
											    <input type="text" class="form-control" name="direccion" id="direccion"><br>
										 
											    <label for="provincia">Provincia:</label><br>
											    <select  class="form-control" name="provincia" id="provincia" style="width:196px;">
												<?php

													foreach($provincias as $provincia){

															echo "<option value='{$provincia->idProvincia}'>{$provincia->nombre}</option>";
													}

												?>

											    </select><br>
											
											    <label for="ciudad">Ciudad:</label><br>
											    <select  class="form-control" name="ciudad" id="ciudad" style="width:196px;">
														<?php

													foreach($ciudades as $ciudad){

															echo "<option value='{$ciudad->idCiudad}'>{$ciudad->nombre}</option>";
													}

												?>

											

												</select>

									</div>
												
								<div class="form-group col-lg-4">
											    <label for="sitioWeb">Sitio Web:</label><br>
											    <input type="text" class="form-control" name="sitioWeb" id="sitioWeb"><br>
											


											
											    <label for="telefono">Telefono:</label><br>
											    <input type="text" class="form-control" name="telefono" id="telefono"><br>

											 	
											    <label for="entidad">Entidad:</label><br>
											     <select  class="form-control"  id="entidad" name="entidad" style="width:196px;">
											     	<option value='0'>Ninguna</option>
											      <?php foreach($entidades as $entidad){

															echo "<option value='{$entidad->idEntidad}'>{$entidad->nombre}</option>";
													  }

												  ?>
												</select>
												<input type="checkbox" name="estado" value="1">Activo<br>


									</div>
						
						</div><!--end rows-->

  									<div class="row">

											<div class="col-lg-3">
													    <label for="rubro">Rubro:</label><br>

													    <!--begin rubro-->
													    <select  class="form-control"  id="origen" multiple="multiple" style="width:196px;">
																<?php

															foreach($rubros as $rubro){

																	echo "<option value='{$rubro->idRubro}'>{$rubro->nombre}</option>";
															}

														?>

													

														</select>
												</div>
												<div class="col-lg-2" style="margin-top:40px">
													<input type="button" class="pasar izq" value="Pasar »"><input type="button" class="quitar der" value="« Quitar"><br />
													<input type="button" class="pasartodos izq" value="Todos »"><input type="button" class="quitartodos der" value="« Todos">
												</div>

											<div class="col-lg-4" style="margin-top:25px">   
												<select name="rubro[]" id="rubro" multiple="multiple" style="width:197px;height:85px"></select>
											</div>
											  
											  <!--end rubro-->





											 
										


									

								</div><!--end rows-->

							
                                




															
				 <!-- begin mapa -->
				    
				<!-- end  mapa -->

						
					 <div clas="form-group">
									
								 <span style="font-weight:bold">Marque Ubicación</span><br>
				                  <div  id="mapa"   style="width:632px;height:300px;"></div>
				                  <input id="pac-input" class="controls col-lg-6 col-lg-offset-1" type="text" placeholder="Buscar"/>


									<label for="entidad">Fotos:</label><br>
									 <input class="btn btn-default" name="fotos[]" style="display:inline" type="file" multiple/>
							
							<button type="submit" class="btn btn-default" >Registrar</button>

					</div>



												
												
											

												

											  
											 
						</form>
				
	

		
			
					
				



		











<!--script-->

<script src="{{URL::asset('js/googleMaps.js')}}"></script>
<script src="{{URL::asset('js/validaNegocioForm.js')}}"></script>



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


<!--script for rubros-->


<script>
		$('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#rubro'); });  
		$('.quitar').click(function() { return !$('#rubro option:selected').remove().appendTo('#origen'); });
		$('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#rubro'); }); });
		$('.quitartodos').click(function() { $('#rubro option').each(function() { $(this).remove().appendTo('#origen'); }); });
		



</script>












@endsection