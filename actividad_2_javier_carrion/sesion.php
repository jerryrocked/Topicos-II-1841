<?php
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>XYZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1 {font-family: "Raleway", Arial, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
</style>
</head>
<body>
<div class="w3-container w3-padding-64 w3-light-grey w3-center w3-large" style="max-width:1500px">
<header class="w3-container w3-padding-64 w3-light-grey w3-center w3-large" style="padding:30px 16px">

<div class="w2-padding-32">
        <div >
          <a href="index.php" class="w3-bar-item w3-button">Home</a>
          <a href="sesion.php"><button><i class="fa fa-diamond w3-margin-right"></i>Vendedores</button></a>

          <div class="w3-display-container">
            <img src="images/logocod.png"  style="width:1100px;height:400px">
             <div class="w3-display-middle w3-large">
                <h1 class="w3-jumbo w3-text-black w3-wide"><b></b></h1>
             </div>
                <div class="w3-display-bottomright w3-container">
                    <p class="w3-text-white w3-xlarge"></p>
             </div>
            </div> 
       </div>
    </div> 

</header>

	<?php
		session_start();
		if (!isset($_SESSION['persona'])){
			$_SESSION['persona']=array();
		}
		if (isset($_POST['insertar'])){
			$rut = $_POST['Rut'];
			$nom_vend = $_POST['nom_vend'];
			$ven_cod = $_POST['ven_cod'] * $config['Precio_cod'];
			$ven_min = $_POST['ven_min'] * $config['Precio_maincraft'];
			$ven_for = $_POST['ven_for'] * $config['Precio_Fornite'];

			$regexp = "/^[a-z0-9]+$/i";
			$solotexto = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
			$resultado = preg_match($regexp,$rut);
			$resultado1 = preg_match($solotexto,$nom_vend);


			if (!$resultado or !$resultado1 or !is_numeric($ven_cod) or !is_numeric($ven_min) or !is_numeric($ven_for)
			or $ven_cod <= "0" or $ven_min <= "0" or $ven_for <= "0"){
				echo "Valores No Validos";
			}else{
				;
				$persona = array(
					"Rut" =>$rut,
					"nom_vend" =>$nom_vend,
					"ven_cod" =>$ven_cod,
					"ven_min" =>$ven_min,
					"ven_for" =>$ven_for
				); 
				if (isset($_SESSION['persona'][$rut])){
					echo "Se ha Modificado la persona con el RUT ".$rut;
				}else {
					echo "Persona Registrada";
				}
				$_SESSION['persona'][$rut]=$persona;
			}
		}else if (isset($_POST['borrar'])){
			if (!isset($_POST['ruts'])){
				echo "No hay personas seleccionadas";
			}else {
			$ruts=$_POST['ruts'];
			print_r($ruts);
			foreach ($_SESSION['persona'] as $key => $value){
				if (in_array($key,$ruts)){
					unset($_SESSION['persona'][$key]);
				}
			}
			echo "Personas Borradas";
		}
	}
	?>
	<br>
	<form  method="post">
		<br>Rut <input type="text" id="Rut" name="Rut" maxlength="10">
		<br>Nombre Vendedor <input type="text" id="nom_vend" name="nom_vend" maxlength="25" >
		<br>Ventas Copias COD <input type="text" id="ven_cod" name="ven_cod" maxlength="2" placeholder="Cantidad de discos vendidos">
		<br>Ventas Copias MIN <input type="text" id="ven_min" name="ven_min" maxlength="2" placeholder="Cantidad de discos vendidos">
		<br>Ventas Copias FOR <input type="text" id="ven_for" name="ven_for" maxlength="2" placeholder="Cantidad de discos vendidos">
		<br>
		<br>
		<button type="submit" name="insertar"> Insertar </button>
		<button type="submit" name="mostrar"> Mostrar </button>
		<button type="submit" name="borrar"> Borrar </button>
	<br>
	<br>
	<?php
	
		if (isset($_POST['mostrar'])){
			if (count($_SESSION['persona'])===0){
				echo "<p> No hay Personas </p>";
			}else {
				echo "<table border=1>";
				echo "<tr>";
				echo "<th></th>";
				echo "<th>RUT</th>";
				echo "<th>Nombre Vendedor</th>";

				echo "<th>$ Ventas COD</th>";
				echo "<th>Cant Copias COD</th>";

				echo "<th>$ Ventas MIN</th>";	
				echo "<th>Cant Copias MIN</th>";

				echo "<th>$ Ventas FOR</th>";
				echo "<th>Cantidad Ventas FOR</th>";

				echo "<th>Total Ventas</th>";
				echo "<th>Comision Call of Duty</th>";
				echo "<th>Comision Minecraft</th>";
				echo "<th>Comision Fortnite</th>";
				echo "<th>Comision Total</th>";
				echo "</tr>";
				foreach ($_SESSION['persona'] as $key =>$value){
					?>
					<tr>
						<td><input type="checkbox" name="ruts[]" value="<?php echo $key; ?>"> </td>
						<td> <?php echo $value["Rut"]; ?> </td>
						<td> <?php echo $value["nom_vend"]; ?> </td>

						<td> <?php echo $value["ven_cod"]; ?> </td>
						<td> <?php echo $value["ven_cod"]/$config['Precio_cod']; ?> </td>

						<td> <?php echo $value["ven_min"]; ?> </td>
						<td> <?php echo $value["ven_min"]/$config['Precio_maincraft']; ?> </td>

						<td> <?php echo $value["ven_for"]; ?> </td>
						<td> <?php echo $value["ven_for"]/$config['Precio_Fornite']; ?> </td>

						<td> <?php echo ($value["ven_cod"]+$value["ven_for"] + $value["ven_min"]);?></td>
						<td> <?php echo $value["ven_cod"]*0.06 ; ?> </td>
						<td> <?php echo $value["ven_min"]*0.04 ; ?> </td>
						<td> <?php echo $value["ven_for"]*0.09 ; ?> </td>
						<td> <?php echo ($value["ven_cod"]*0.6 + $value["ven_min"]*0.4 + $value["ven_for"]*0.9); ?> </td>

					</tr>
					<?php 
				}
				echo "</table>";
			}
		}
	?>

	</form>
</body>
</html>