
$( "#negocioForm").submit(function(){


	    $razonSocial=$("#razonSocial").val();
		$direccion=$("#direccion").val();
		$telefono=$("#telefono").val();
		$rubro=$("#rubro").val();
		$latitud=$("#latitud").val();


 if($razonSocial==""){

 alert("ingrese Razón Social");
 	//event.preventDefault();
 	return false;
 }



if($direccion==""){

 alert("ingrese direccion");
 	return false;
 }




if($telefono==""){

 alert("ingrese telefono");
 	return false;
 }



if($rubro==""){

 alert("ingrese rubro");
 	return false;
 }


if($latitud==""){

 alert("marque su ubicacón en el mapa");
 	return false;
 }






});
