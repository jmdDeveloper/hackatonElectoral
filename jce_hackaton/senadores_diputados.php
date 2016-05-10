<?php
include("shared.php");
?>
<div id="page">
				<div class="container">
					<div class="row">
						<div class="12u">
							<section id="content">
								
									<h2>Senaduria Por provincia</h2>
									<p>Los senadores y diputados por provincias 
									</p>
									<select id="selectDiputado">
									</select>								
							</section>
						</div>
					</div>

				</div>	
			</div>

<script type="text/javascript">$("#senadores_diputados").attr("class","active");
$(document).ready(function(){

   resquest = $.ajax({
   	url: "motor.php",
   	method: 'POST',
   	data:{"Hola":"hola"}

   });

   resquest.done(function (response,textStatus, jqXHR){

    console.log("Listo ha termino todo " + response);
   });

});



</script>