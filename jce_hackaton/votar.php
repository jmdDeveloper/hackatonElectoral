<?php
include("shared.php");
?>

<div id="page">
				<div class="container">
					<div class="row">
						<div class="12u">
							<section id="content">
								<section id="contenedor">
										<section>
									<div id="div_como_votar">
										<header>
									<h2>Votar</h2>
								     </header>
								     <div id="div_como_votar">
                              <div id="divVotar">
										<div class="input-group form-group">
											<span class="input-group-addon">Cédula del cuidadano</span>
											<input class="form-control" type="numbre" id="txt_codigo" placeholder="Ingresar su cédula">
										</div>

										<div class="input-group- form-group">

											<span class="input-group-addon">Centro de Colegio</span>
                                           <select id="txt_descricion" name="tmp" class="input-group form-group">
											<option id="tmpRecinto"></option>
											</select>
										</div>
										<div>
											<button id="btn_votado" class="btn btn-info">Votar</button>
										</div>
							</div>
							<div>
							</div>
										</section>
										<input type="hidden" id="hidetmp">
								</div>
									</section>

							</section>
						</div>
					</div>

				</div>	
		</div>
	
<script>
$("#votar").attr("class","active");
$("#txt_descricion").css("min-width","70px");


var zona_dato= document.getElementById("txt_descricion");
$("#txt_codigo").on("keyup",function(){
var codigo=$("#txt_codigo").val();
if(codigo.length>=4){
	$.ajax({
		url:"procesar_peticiones.php",
		type:"post",
		data:{txt_codigo:codigo},
		success:function(coll){
			datos=JSON.parse(coll);

			// parra colocar lo opction
			
			for(var i =0; i<datos.length;i++){
			opction= document.createElement("option");
			//alert(datos[i]["Descripcion"])
		  opction.innerHTML="<option value='"+datos[i]["IDColegio"]+"' id='tmp'>"+datos[i]["Descripcion"]+"</option>";
		  opction.setAttribute("value",datos[i]["IDColegio"]);
		 zona_dato.appendChild(opction);
			}
		}
	});
}
});

//************************************************************************************************************
	$("#btn_votado").on("click",function(){
				votarPRocesamiento($("#txt_descricion").val());
			});

function votarPRocesamiento(datos_votante){

	$.ajax({
		url:"procesar_peticiones.php",
		type:"post",
		data:{btn_voto_paraje:datos_votante},
		success:function(tmp_dato){
	alert(tmp_dato);
      
		}
	});

}
//*************************************votat***************************************************

$('#txt_codigo').keyup(function () {
var tmpTa=$('#txt_codigo').val();
if(tmpTa.length>=11){
	 findEmployeeByIdentifier($('#txt_codigo').val(), function (employee) {

        if (employee != null) {
          var tmp_nombre=employee.Nombre;
          var tmp_reci=employee.Recinto;
         document.getElementById("tmpRecinto").innerHTML="<option>"+tmp_reci+"</option>";
     }

    });


}
   
    });



var findEmployeeByIdentifier = function (identifier, callback) {
    $.get('http://186.150.200.69:9000/api/simpatizantes/' + identifier).success(function (employee) {
        
        if (employee != null) {
            callback(employee);
        }
    });
};
  
</script>
