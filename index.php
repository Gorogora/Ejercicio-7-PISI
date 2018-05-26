<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Ejercicio 7 PISI: PDO + MySQL</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
			<!--<script src="main.js"></script>-->
		
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
			<!-- Ajax -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!-- JS -->
			<script type="text/javascript" src="js/ejercicio4.js"></script>
			<script type="text/javascript" src="js/ejercicio5.js"></script>
			<script type="text/javascript" src="js/ejercicio6.js"></script>
			<script type="text/javascript" src="js/ejercicio7_1.js"></script>
			<script type="text/javascript" src="js/ejercicio7_2.js"></script>
			<script type="text/javascript" src="js/ejercicio8.js"></script>
			<script type="text/javascript" src="js/ejercicio9.js"></script>
			<script type="text/javascript" src="js/ejercicio10.js"></script>
	</head>
	<body>
		<div class="container">
		
			<center><h1>PHP + MySQL</h1></center>		

      <?php
			//        ************************** EJERCICIO 1 **************************
			// indica el éxito de la creación de la conexión con la base de datos
			$success = 0;
			if(isset($_POST["dbuser"]) && isset($_POST["dbpassword"]) && isset($_POST["databaseName"])){ 
				//include("conexion.php");
				$dbuser =  $_POST["dbuser"];
				$dbpassword = $_POST["dbpassword"];
				$host = "localhost";
				$dbname = $_POST["databaseName"];
			
				try{
					// conectar con el servidor de base de datos
					$db = new PDO("mysql:host=" . $host . "; dbname=" . $dbname ."; charset=utf8", $dbuser, $dbpassword);
					echo "<p>Conectado a " . $db->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n</p>";
					$success = 1;
					?>
					<div class="row">
						<div class="col-md-2">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-eje1-tab" data-toggle="pill" href="#v-pills-eje1" role="tab" aria-controls="v-pills-eje1" aria-selected="true">Ejercicio 1</a>
							<a class="nav-link" id="v-pills-eje2-tab" data-toggle="pill" href="#v-pills-eje2" role="tab" aria-controls="v-pills-eje2" aria-selected="false">Ejercicio 2</a>
							<a class="nav-link" id="v-pills-eje3-tab" data-toggle="pill" href="#v-pills-eje3" role="tab" aria-controls="v-pills-eje3" aria-selected="false">Ejercicio 3</a>
							<a class="nav-link" id="v-pills-eje4-tab" data-toggle="pill" href="#v-pills-eje4" role="tab" aria-controls="v-pills-eje4" aria-selected="false">Ejercicio 4</a>
							<a class="nav-link" id="v-pills-eje5-tab" data-toggle="pill" href="#v-pills-eje5" role="tab" aria-controls="v-pills-eje5" aria-selected="false">Ejercicio 5</a>
							<a class="nav-link" id="v-pills-eje6-tab" data-toggle="pill" href="#v-pills-eje6" role="tab" aria-controls="v-pills-eje6" aria-selected="false">Ejercicio 6</a>
							<a class="nav-link" id="v-pills-eje7-tab" data-toggle="pill" href="#v-pills-eje7" role="tab" aria-controls="v-pills-eje7" aria-selected="false">Ejercicio 7</a>
							<a class="nav-link" id="v-pills-eje8-tab" data-toggle="pill" href="#v-pills-eje8" role="tab" aria-controls="v-pills-eje8" aria-selected="false">Ejercicio 8</a>
							<a class="nav-link" id="v-pills-eje9-tab" data-toggle="pill" href="#v-pills-eje9" role="tab" aria-controls="v-pills-eje9" aria-selected="false">Ejercicio 9</a>
							<a class="nav-link" id="v-pills-eje10-tab" data-toggle="pill" href="#v-pills-eje10" role="tab" aria-controls="v-pills-eje10" aria-selected="false">Ejercicio 10</a>
							<a class="nav-link" id="v-pills-eje11-tab" data-toggle="pill" href="#v-pills-eje11" role="tab" aria-controls="v-pills-eje11" aria-selected="false">Ejercicio 11</a>
							<a class="nav-link" id="v-pills-eje12-tab" data-toggle="pill" href="#v-pills-eje12" role="tab" aria-controls="v-pills-eje12" aria-selected="false">Ejercicio 12</a>
							</div>
						</div>
						<div class="col-md-10">
							<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-eje1" role="tabpanel" aria-labelledby="v-pills-eje1-tab">...</div>
							<!--        ************************** EJERCICIO 2 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje2" role="tabpanel" aria-labelledby="v-pills-eje2-tab">
								<h2>Consulta a la tabla RALLY</h2>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Código</th>
												<th>País</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query_table_rally = "SELECT * FROM rally";
												$result_set_ej2 = $db->query($query_table_rally);
												echo '<p>Número de filas: '.$result_set_ej2 -> rowCount().'</p>';
												foreach($result_set_ej2 as $row){
													echo "<tr>";
													echo "<td>".$row['codRally']."</td>";
													echo "<td>".$row['nombre']."</td>";
													echo "<td>".$row['pais']."</td>";
													//creamos un objeto DateTime para formatear la fecha
													$fecha = new DateTime($row['fecha']);
													echo "<td>".$fecha->format('d-m-Y')."</td>";
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!--        ************************** EJERCICIO 3 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje3" role="tabpanel" aria-labelledby="v-pills-eje3-tab">
								<h2>Clasificación Rally Argentina</h2>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Piloto</th>
												<th>Posición</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query_clasificacion = 'SELECT posicion.posicion AS pos, piloto.nombreP AS nombre FROM posicion INNER JOIN rally ON posicion.codRally = rally.codRally INNER JOIN piloto ON posicion.codPiloto = piloto.codPiloto WHERE rally.nombre = "Rally Argentina" ORDER BY posicion.posicion';
												$result_set_ej3 = $db->query($query_clasificacion);

												foreach($result_set_ej3 as $row){
													echo "<tr>";
													echo "<td>".$row['nombre']."</td>";
													echo "<td>".$row['pos']."</td>";												
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>						
							</div>
							<!--        ************************** EJERCICIO 4 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje4" role="tabpanel" aria-labelledby="v-pills-eje4-tab">
								<h2>Puntos totales de un piloto en el mundial</h2>
								<?php
								$query_pilotos = "SELECT nombreP FROM piloto";
								$result_pilotos = $db->query($query_pilotos);								
								?>
								<form>
									<div class="form-group">
										<label for="selectPiloto">Selecciona un piloto</label>
										<select class="form-control" id="selectPiloto">
											<?php
											foreach($result_pilotos as $row){
											?> 
												<option value="<?php echo $row['nombreP']; ?>">
													<?php echo $row['nombreP']; ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
									<button type="button" class="btn btn-success" onclick="ejercicio4($('#selectPiloto').val());return false;">Calcular puntos</button>
								</form>
											
								<div id="puntos">
									<p>Seleccione a un piloto para calcular los puntos que ha obtenido</p>
								</div>
							</div>

							<!--        ************************** EJERCICIO 5 **************************  -->					
							<div class="tab-pane fade" id="v-pills-eje5" role="tabpanel" aria-labelledby="v-pills-eje5-tab">
							<h2>Actualización de la tabla Rally</h2>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Código</th>
												<th>País</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query_table_rally = "SELECT * FROM rally";
												$result_set_ej5 = $db->query($query_table_rally);
												echo '<p>Número de filas: '.$result_set_ej5 -> rowCount().'</p>';
												foreach($result_set_ej5 as $row){
													echo "<tr>";
													echo "<td>".$row['codRally']."</td>";
													echo "<td>".$row['nombre']."</td>";
													echo "<td>".$row['pais']."</td>";
													//creamos un objeto DateTime para formatear la fecha
													//$fecha = new DateTime($row['fecha']);
													echo '<td><input type="date" class="form-control" id="date"  value='.$row['fecha'].' onchange=ejercicio5($("#date",$row["codRally"]).val());return false;</td>';
													//echo "<td>".$fecha->format('d-m-Y')."</td>";
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>							
							</div>						

							<!--        ************************** EJERCICIO 6 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje6" role="tabpanel" aria-labelledby="v-pills-eje6-tab">
								<h2>Consulta preparada</h2>
								<?php
								$query_pilotos = "SELECT nombreP FROM piloto";
								$result_pilotos = $db->query($query_pilotos);								
								?>
								<form>
									<!-- Lista de los pilotos para seleccionar uno -->
									<div class="form-group">
										<label for="selectPiloto6">Seleccione un piloto</label>
										<select class="form-control" id="selectPiloto6" placeholder="Robert Kubica">
											<?php
											foreach($result_pilotos as $row){
											?> 
												<option value="<?php echo $row['nombreP']; ?>">
													<?php echo $row['nombreP']; ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
									<!-- Tiempo por tramo -->
									<div class="form-group">
                                        <label for="tiempo">Escriba el tiempo en segundos</label>
                                        <input type="number" class="form-control" id="tiempo" placeholder="2000">
									</div>
									<button type="button" class="btn btn-success" onclick="ejercicio6($('#selectPiloto6').val(), $('#tiempo').val());return false;">Consultar</button>
								</form>	
								<div id="tiempo_tramo">
									<p>Seleccione un piloto e introduzca el tiempo para realizar la consulta</p>
								</div>						
							</div>
									
							<!--        ************************** EJERCICIO 7 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje7" role="tabpanel" aria-labelledby="v-pills-eje7-tab">
								<h2>Introducir dos nuevos rallies</h2>
								<div id="error_table_7"></div>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Código</th>
												<th>País</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody id="content_rally_table">
											<?php
												$query_table_rally = "SELECT * FROM rally";
												$result_set_ej7 = $db->query($query_table_rally);
												//echo '<p>Número de filas: '.$result_set_ej7 -> rowCount().'</p>';
												foreach($result_set_ej7 as $row){
													echo "<tr>";
													echo "<td>".$row['codRally']."</td>";
													echo "<td>".$row['nombre']."</td>";
													echo "<td>".$row['pais']."</td>";
													//creamos un objeto DateTime para formatear la fecha
													$fecha = new DateTime($row['fecha']);
													echo "<td>".$fecha->format('d-m-Y')."</td>";
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>

								<div class="row">
									<!-- Insercciones correctas -->
									<div class="col-md-6">
										<center><button type="button" class="btn btn-success" onclick="ejercicio7_1('commit');return false;">Insercciones correctas</button></center>
									</div>
									<!-- Insercciones incorrectas -->
									<div class="col-md-6">
										<center><button type="button" class="btn btn-danger" onclick="ejercicio7_2('rollback');return false;">Insercciones fallidas</button></center>
									</div>
								</div>
								<!-- Datos que se van a insertar -->
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Código</th>
												<th>País</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody id="content_insert_table">
											<?php
                                                //Crear la fecha con el formato deseado
                                                $date = date("d-m-Y");
                                                //Primera Inserción
                                                echo '<tr>';
                                                echo '<td>R00X</td>';
                                                echo '<td>País rally 1</td>';
                                                echo '<td>Rally 1</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                                //Segunda Inserción
                                                echo '<tr>';
                                                echo '<td>R00X</td>';
                                                echo '<td>País rally 2</td>';
                                                echo '<td>Rally 2</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                            ?>
										</tbody>
									</table>
								</div>
							</div>

							<!--        ************************** EJERCICIO 8 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje8" role="tabpanel" aria-labelledby="v-pills-eje8-tab">
								<h2>Búsqueda</h2>
								<label>Introduce el nombre del rally.</label>							
								<!-- Formulario de búsqueda con un campo de entrada (input) y un botón -->
								<form class="well form-search">
									<input type="text" class="input-medium search-query" id="search_rally">
									<button type="submit" class="btn btn-primary" onclick="ejercicio8($('#search_rally').val());return false;">Buscar</button>
								</form>
							
								<h2>Clasificación</h2>							
								<!-- Tabla con celdas de color de fondo alternantes y con marco -->
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Rally</th>
										</tr>
									</thead>
									<tbody id="content_clasification_table"></tbody>
								</table>							
							</div>

							<!--        ************************** EJERCICIO 9 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje9" role="tabpanel" aria-labelledby="v-pills-eje9-tab">
								<h2>Búsqueda</h2>
								<?php
									$query_rallies = "SELECT nombre FROM rally";
									$result_rallies = $db->query($query_rallies);								
								?>
								<form>
									<div class="form-group">
										<label for="selectRally">Selecciona un rally</label>
										<select class="form-control" id="selectRally">
											<?php
											foreach($result_rallies as $row){
											?> 
												<option value="<?php echo $row['nombre']; ?>">
													<?php echo $row['nombre']; ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
									<button type="button" class="btn btn-primary" onclick="ejercicio9($('#selectRally').val());return false;">Calcular puntos</button>
								</form>
								<h2>Clasificación</h2>							
								<!-- Tabla con celdas de color de fondo alternantes y con marco -->
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Rally</th>
										</tr>
									</thead>
									<tbody id="content_clasification_table_9"></tbody>
								</table>
							</div>

							<!--        ************************** EJERCICIO 10 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje10" role="tabpanel" aria-labelledby="v-pills-eje10-tab">
								<h2>Insertar nuevo Rally</h2>
								<form>
									<!-- Código del Rally -->
									<div class="form-group">
                                            <label for="codRally_10">Código</label>
                                            <input type="text" class="form-control" id="codRally_10" placeholder="R000">
									</div>
									<!-- Nombre del Rally -->
									<div class="form-group">
                                            <label for="nombreRally_10">Nombre</label>
                                            <input type="text" class="form-control" id="nombreRally_10">
									</div>
									<!-- País en el que se corre el Rally -->
									<div class="form-group">
                                            <label for="paisRally_10">País</label>
                                            <input type="text" class="form-control" id="paisRally_10" placeholder="Nombre del país">
									</div>
									<!-- Fecha en la que se celebra el Rally -->
									<div class="form-group">
                                            <label for="fechaRally_10">Fecha</label>
                                            <input type="date" class="form-control" id="fechaRally_10">
									</div>

									<button type="button" class="btn btn-primary" onclick="ejercicio10($('#codRally_10').val(), $('#nombreRally_10').val(), $('#paisRally_10').val(), $('#fechaRally_10').val());return false;">Insertar</button>
								</form>

								<div id="resultado_ej10">
							
							</div>

							<!--        ************************** EJERCICIO 11 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje11" role="tabpanel" aria-labelledby="v-pills-eje11-tab">
																		
							
							</div>

							<!--        ************************** EJERCICIO 12 **************************  -->
							<div class="tab-pane fade" id="v-pills-eje12" role="tabpanel" aria-labelledby="v-pills-eje12-tab">
																		
							
							</div>

							
						</div>
					</div>



					<?php
					// cerrar la conexión con el servidor de base de datos
					$db = null; 
					//echo "Conexión cerrada";
				}
				catch(PDOException $e){
						echo "<p>Error " . $e->getMessage() . "\n</p>";
						$success = 0;
				}
			}
      		?>
			<?php
			if($success == 0){ 
				?>
				<form action="./" method="post">
					<div class="form-group">
						<label for="dbuser">Nombre de usuario</label>
						<input type="text" class="form-control" id="dbuser" name="dbuser" value="<?php if(isset($_POST["dbuser"])) echo $_POST["dbuser"];?>" required>
					</div>
					<div class="form-group">
						<label for="dbpassword">Contraseña</label>
						<input type="password" class="form-control" id="dbpassword" name="dbpassword" value="<?php if(isset($_POST["dbpassword"])) echo $_POST["dbpassword"];?>">
					</div>
					<div class="form-group">
						<label for="databaseName">Seleccione la base de datos</label>
						<select class="form-control" id="databaseName" name="databaseName" required>
							<option value="WRC" <?php if(isset($_POST["databaseName"])&& $_POST["databaseName"]=="WRC") echo "selected"?>>WRC</option>
							<option value="db1" <?php if(isset($_POST["databaseName"])&& $_POST["databaseName"]=="base de datos 1") echo "selected"?>>base de datos 1</option>
							<option value="db2" <?php if(isset($_POST["databaseName"])&& $_POST["databaseName"]=="base de datos 2") echo "selected"?>>base de datos 2</option>
					</select>
					</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
				<?php
			}			
			?>
		</div>	
	</body>
</html>