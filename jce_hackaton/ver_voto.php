<?php
include("shared.php");
?>

<div id="page">
				<div class="container">
					<div class="row">
						<div class="12u">
							<section id="content">
                               <center>
                               <header>
									<h2>Proceso electoral: Ver votos.</h2>
								</header>
							</center>
<section id="zona_dato">

	<div id="divVotar">

										

		<div class="input-group form-group">
			<span class="input-group-addon">Código colegio</span>
           <input  class="form-control" type="text" id="txt_codigo_busqueda" placeholder>
           
		</div>
		<div class="input-group  form-group">
             <select class="form-control" id="txt_centros">
						
					</select>
		</div>
  </div>

	<table class="table table-hover">

		<thead>
			<th>
				<tr>
				<th>Ubicación del Colegio</th>
				<th>Cantidad de Inscritos</th>
				<th>Cantidad votos sin realizar</th>
				<th>Cantidad de votos realizados</th>
				<th>Progreso de votación</th>
			</tr>
		</thead>
		<tbody id="zona_Datos_table">
		</tbody>
	</table>
</section>

							</section>
						</div>
					</div>

				</div>	
			</div>

	
<script>
$("#txt_centros").css("min-width","120px");
$("#ver_voto").attr("class","active");
var zona_dato= document.getElementById("txt_centros");
////***************************************************************************************
$("#txt_codigo_busqueda").on("keyup",function(){
var codigo=$("#txt_codigo_busqueda").val();
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
	$.ajax({
		url:"procesar_peticiones.php",
		type:"post",
		data:{btn_voto:document.getElementsByName("tmp")[0].value},
		success:function(tmp_dato){


		}
	});

});
function obtenerID(id){
alert(id);
}

$("#txt_centros").on("change",function(){
	 document.getElementById("zona_Datos_table").innerHTML="";
//alert($("#txt_centros").val());
	sonad=$("zona_Datos_table");
	$.ajax({
		url:"procesar_peticiones.php",
		type:"post",
		data:{txt_codigo_busqueda:$("#txt_centros").val()},
		success:function(coll){
			datos=JSON.parse(coll);
			// parra colocar lo opction
			for(var i =0; i<datos.length;i++){
			var tr=document.createElement('tr');
			tr.innerHTML="<td>"+datos[i]['Descripcion']+"</td>"+
						"<td>"+datos[i]['CantidadInscritos']+"</td>"+
						"<td>"+(parseInt(datos[i]['CantidadInscritos'])-parseInt(datos[i]['CAintidadVotado']))+"</td>"+
						"<td>"+datos[i]['CAintidadVotado']+"</td>"+"<td><div id='proceso_estado'style='width:100%;height:25px; background:#ccc; border:#000 solid 1px;'><div id='barraProceso' style='background:#0f0; height:25px;'>'"+(parseInt(datos[i]['CantidadInscritos'])/parseInt(datos[i]['CAintidadVotado']))/100+"'%</div></div></td>";
		      document.getElementById("zona_Datos_table").appendChild(tr);
		      document.getElementById("barraProceso").style.width="50%";
			}
		}
	});


});
 
	


</script>
</body>
</html>