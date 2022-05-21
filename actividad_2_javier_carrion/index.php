<?php
include "config.php";
?> 

<!DOCTYPE html>
<html>
<head>
<title>XYZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1 {font-family: "Raleway", Arial, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
</style>
</head>
<body>
<!-- !contenido pagina! -->
<div class="w3-container w3-padding-64 w3-light-grey w3-center w3-large" style="max-width:1500px">
<!-- Header -->
<header class="w3-container w3-padding-64 w3-light-grey w3-center w3-large" style="padding:30px 16px">

<div class="w2-padding-32">
        <div >
          <a href="#" class="w3-bar-item w3-button">Home</a>
          <a href="#" class="w3-bar-item w3-button w3-light-grey">Quienes Somos</a>
          <a href="#" class="w3-bar-item w3-button">Contacto</a>
          <a href="#" class="w3-bar-item w3-button w3-hide-small">Otros</a>

          <a href="sesion.php"><button><i class="fa fa-diamond w3-margin-right"></i>Vendedores</button></a>

          <div class="w3-display-container">
            <img src="images/logocod.png"  style="width:100%;height:400px">
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

<!-- Photo Grid -->
<div class="w3-row-padding" style="margin-bottom:128px;align-items:center">
  <div class="w3-half">
    <img src="images/fornite.png" width="560" height="315">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/JdeClWe1Tnw" title="Fornait Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="w3-container w3-white">
    <h3><b> $Precio <?php echo $config['Precio_Fornite']; ?></b></h3>
    <h3><b><?php echo $config['Descripcion_Fornite']; ?></b></h3>
    </div>
    <br>
    <img src="images/logocod.png" width="560" height="315">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/zdVk4hHQTn0" title="Call Of Duty Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
    <div class="w3-container w3-white">
        <h3><b>$Precio <?php echo $config['Precio_cod']; ?></b></h3>
        <h3><b><?php echo $config['Descripcion_COD']; ?></b></h3>
    </div>
    <br> 
  </div>
  <div class="w3-half">
    <img src="images/maincraftlogo.png" width="560" height="315">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/vdrn4ouZRvQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
    <div class="w3-container w3-white">
    <h3><b>$Precio <?php echo $config['Precio_maincraft']; ?></b></h3>
    <h3><b><?php echo $config['Descripcion_maincraft']; ?></b></h3>
    </div>
    </div>

  </div>

<!-- End Page Content -->
</div>
<br>
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>

</footer>

</body>
</html>