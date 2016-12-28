<!DOCTYPE html>
<html>
<head>
	<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcnY71E70h7HZHPNlhc-Qi4a1CYmM5-U">
    </script>
</head>
<body>
	
    <script>
		var map;        
		
		window.onload = function Iniciar(){
			var myCenter=new google.maps.LatLng(-33.510831, -70.753041);
			var marker=new google.maps.Marker({
			    position:myCenter
			});

			function initialize() {
			  var mapProp = {
			      center:myCenter,
			      zoom: 16,
			      draggable: true,
			      scrollwheel: true,
			      streetViewControl: false,
			      mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  
			  map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
			  marker.setMap(map);
			    
			  google.maps.event.addListener(marker, 'click', function() {
			      
			    infowindow.setContent(contentString);
			    infowindow.open(map, marker);
			    
			  }); 
			};
			google.maps.event.addDomListener(window, 'load', initialize());

			google.maps.event.addDomListener(window, "resize", resizingMap());

			$('#myMapModal').on('show.bs.modal', function() {
			   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
			   resizeMap();
			})

			function resizeMap() {
			   if(typeof map =="undefined") return;
			   setTimeout( function(){resizingMap();} , 400);
			}

			function resizingMap() {
			   if(typeof map =="undefined") return;
			   var center = map.getCenter();
			   google.maps.event.trigger(map, "resize");
			   map.setCenter(center); 
			}
		}

	</script>
	
    				

	<footer class="footer-distributed">

		<div class="footer-left">

			<h3>Twins<span> ChatOnline</span></h3>

			<p class="footer-links">
				<a href="#" data-toggle="modal" data-target="#modalCreditos">
					Créditos
				</a>
				·
				<a href="#" data-toggle="modal" data-target="#myMapModal">Nuestra Oficina</a>
				<!-- ·
				<a href="#">Pricing</a>
				·
				<a href="#">About</a>
				·
				<a href="#">Faq</a>
				·
				<a href="#">Contact</a> -->
			</p>

			<p class="footer-company-name">Twins &copy; 2016</p>
		</div>

		<div class="footer-center">

			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>En algún lugar de</span> Santiago, Chile.</p>
			</div>

			<div>
				<i class="fa fa-phone"></i>
				<p>+569 59423978</p>
			</div>

			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:Michael.nunezb@outlook.com">soporte@twins.com</a></p>
			</div>

		</div>

		<div class="footer-right">

			<p class="footer-company-about">
				<span>Sobre Twins</span>
				Twins ChatOnline es la mejor plataforma para encontrar pareja, hacer amistades o simplemente chatear un rato, se social, usa Twins.
			</p>

			<div class="footer-icons">
				<a href="https://www.facebook.com/groups/111416662622312/" target="_blank"><i class="fa fa-facebook"></i></a>
				<!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
			</div>

		</div>

	</footer>

	<!-- Modal -->
	<div class="modal fade" id="modalCreditos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Créditos</h4>
				</div>
				<div class="modal-body">

					<table width="100%">
						<tr>
							<td align="center">
								<p style="color:  black; font: normal 36px 'Cookie', cursive; margin: 0;">

									&nbsp;Twins

									<span style="color:  #5383d3;"> 
									    ChatOnline
									</span>

								</p>

							</td>
						</tr>
						<tr>
							<td align="center">
								<strong>Fué desarrollado con <i class="fa fa-heart fa-lg" style="color: red;" aria-hidden="true"></i> por:</strong>
							</td>
						</tr>
					</table>
					
					<br/>

					<table class="table table-hover">
						<tbody>
							<tr>
								<td>
									<img class="img-rounded" src="../Resources/images/michael-creditos.jpg"  alt="Card image cap" style="width: 128px;">
								</td>
								<td>
									<h4 class="list-group-item-heading"><strong>Michael Núñez</strong></h4>
									<p class="list-group-item-text">Jefe de Proyecto.</p>
									<p class="list-group-item-text">Mi.nunezb@twins.cl </p>
								</td>
							</tr>
							<tr>
								<td>
									<img class="img-rounded" src="../Resources/images/jose-creditos.jpg"  alt="Card image cap" style="width: 128px;">
								</td>
								<td>
									<h4 class="list-group-item-heading"><strong>José Alvear</strong></h4>
									<p class="list-group-item-text">Analista Funcional y QA.</p>
									<p class="list-group-item-text">Jo.Alvear@twins.cl</p>

								</td>
							</tr>
							<tr>
								<td>
									<img class="img-rounded" src="../Resources/images/edo-creditos.jpg"  alt="Card image cap" style="width: 128px;">
								</td>
								<td>
									<h4 class="list-group-item-heading"><strong>Eduardo Polanco</strong></h4>
									<p class="list-group-item-text">Analista Programador.</p>
									<p class="list-group-item-text">Ed.polanco@twins.cl</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Gracias <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myMapModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title">Nuestra Oficina</h4>

            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div id="map-canvas" style="width:100%; height:480px;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

	
</body>
</html>