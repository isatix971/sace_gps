<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Cotizaci&oacute;n Prana</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="shortcut icon" href="./content/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="./content/css/bootstrap.css">
    
<style>
    .intro {
    background-image: url("./content/img/intro-bg.jpg");
    background-position: center;
}
</style>
</head>
    <?php 
      $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
      
    $fecha = "Melipilla , ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y') ?>
    <body class="intro">
		<div class="container ">
			<div class="row">
				<div class="col-md-10">
				<img src="./content/img/logoprana.png" width="178" alt="prana_logo.png">
				</div>
                                <div class="col-md-2 text-right">
                                        <em class=""><?php echo $fecha?></em>
                                </div>
                        </div>

			<div class="row">
				<div class="col-md-12">
				<h2><p>
                                        <br>Se&#241;ores:<br>
                                <strong><?php echo $nomEmpresa?></strong></h2>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
				<p>
				<br><em>Considerando que el recurso agua, es lo m&aacute;s importante en el desarrollo de la vida humana y pensando que hoy en d&iacute;a las personas buscan alternativas sanas y en equilibrio con la naturaleza, nace a fines del a&#241;o 2004 en Melipilla, "PRANA AGUA PURA Y NATURAL", &nbsp;con el objetivo de producir agua purificada y libre de sodio, para satisfacer las necesidades del mundo moderno.
				<br xmlns="http://www.w3.org/1999/xhtml">
				<br xmlns="http://www.w3.org/1999/xhtml">PRANA es una empresa seria y comprometida, que mantiene una pol&iacute;tica de alta calidad y seguridad en su producto. Adem&aacute;s, es primordial brindar un servicio personalizado a nuestros clientes, y como prueba de ello es la fidelidad de nuestros consumidores.
				<br xmlns="http://www.w3.org/1999/xhtml">Se cuenta con una planta purificadora, que permite realizar el proceso productivo orientado hacia la obtenci&oacute;n de un producto de primera calidad. Como resultado se obtiene: agua &nbsp;microfiltrada, esterilizada, ozonificada, libre de sodio, totalmente balanceada y &nbsp;con los minerales que nuestro organismo es capaz de metabolizar (0,13 &nbsp;a &nbsp;0.50 ppm. de S&oacute;lidos Totales Disueltos (TDS)), lo que verifica la calidad de nuestro producto, dando la confianza y seguridad que usted necesita. &nbsp;&nbsp;&nbsp;&nbsp;
				<br xmlns="http://www.w3.org/1999/xhtml">
				<br xmlns="http://www.w3.org/1999/xhtml">PRANA, agua pura y natural &nbsp;abastece &nbsp;el &aacute;rea metropolitana con maquinas de fr&iacute;o calor y &nbsp;botellones de 20 litros. Con una capacidad de respuesta de &nbsp;m&aacute;ximo 24 horas. Adem&aacute;s se envasa en botellas de 500cc y 1500cc &nbsp;con logo institucional de nuestros clientes, entreg&aacute;ndoles a &eacute;stos una herramienta de publicidad. 
				<br xmlns="http://www.w3.org/1999/xhtml">
				<br xmlns="http://www.w3.org/1999/xhtml">Finalmente se cuenta con un equipo de profesionales y t&eacute;cnicos de amplia y probada experiencia en el mercado nacional.
				<br xmlns="http://www.w3.org/1999/xhtml">Quedando a su disposici&oacute;n, 
				</em>
				<br>
				<br><em>Cordialmente.<br>Francisco Vergara</em>
				</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
				<br><br><br><br>
				<br><strong>Envasadora y Embotelladora Prana Ltda.</strong>
                                    <br>Giro: Purificadora de agua
				<br>Arza #560 / Fono: 228316842 
                                    <br> Melipilla - Region Metropolitana
				<br>Web: www.aguaprana.cl &nbsp;Mail:&nbsp;ventas@aguaprana.cl
				</div>
			</div>           
			<br><br><br><br>
                        <div class="row">
				<div class="col-md-10">
				<img src="./content/img/logoprana.png" width="178" alt="prana_logo.png">
				</div>
                                <div class="col-md-2 text-right">
                                        <em class=""><?php echo $fecha?></em>
                                </div>
                        </div>

			<div class="row">
				<div class="col-md-12 text-center text-capitalize">
				<h1>Cotizaci&oacute;n</h1>
				</div>

			</div>
                        <div class="row">
				<div class="col-md-12 text-left ">
                                    <br><strong>Contacto:</strong> <?php echo $nomContacto?> 
                                    <br><strong>Correo:</strong> <?php echo $correo?> 
                                    <br><strong>Telefono:</strong> <?php echo $telefono?>
				</div>

			</div>
                        <div class="row">
				<div class="col-md-12 text-left ">
                                    <br>
<?php echo "<p><em>De nuestra consideraci&oacute;n, es grato para nosotros someter a cotizaci&oacute;n los siguientes productos: </em></p>"?>
				</div>
                            <br><br>
			</div>

			<div class="row">
				<div class="col-md-12">    
				<table class="table table-striped">
				<thead>
				<tr>
                                <th>  </th>
				<th>Cantidad</th>
				<th>Detalle</th>
				<th>Precio Unitario</th>
                                <th>Total</th>
				</tr>
				</thead>
				
                                    <?php 
                                    $totalb20 =0;
                                    $totalb10 =0;
                                    $totaldispen =0;
                                    $totaldispenplastico =0;
                                    $totalllave =0;
                                    
                                    if($b20cantidad > 0){
                                        $totalb20 = $b20precio*$b20cantidad;
                                        echo "<tr>"
                                        . "<td>".$b20cantidad."</td>"
                                        . "<td>Botellones Retornables de 20 Litros.</td>"
                                        . "<td>".$b20precio."</td>"
                                        . "<td>".$totalb20."</td>"        
                                        . "</tr>";
                                    }if($b10cantidad > 0){
                                        $totalb10 = $b10precio*$b10cantidad;
                                        echo "<tr>"
                                        . "<td>".$b10cantidad."</td>"
                                        . "<td>Botellas de 10 Litros.</td>"
                                        . "<td>".$b10precio."</td>"
                                        . "<td>".$totalb10."</td>"        
                                        . "</tr>";
                                    
                                    }if($dispencant > 0){
                                        $totaldispen = $dispenprecio*$dispencant;
                                        if($dispenmoda ==1){
                                            $moda = "Arriendo mensual de $8.000";
                                        }
                                        if($dispenmoda ==2){
                                            $moda = "Venta";
                                        }
                                        if($dispenmoda ==3){
                                            $moda = "En comodato (consumo minimo) de 10 bidones mensuales";
                                        }
                                        echo "<tr>"
                                        . "<td>".$b10cantidad."</td>"
                                        . "<td>En modalidad de: ".$moda." </td>"
                                        . "<td>".$dispenprecio."</td>"
                                        . "<td>".$totaldispen."</td>"        
                                        . "</tr>";
                                    }
                                    if($dispenplasticocantidad > 0){
                                        $totaldispenplastico= $dispenplasticoprecio*$dispenplasticocantidad;
                                     
                                        echo "<tr>"
                                        . "<td>".$dispenplasticocantidad."</td>"
                                        . "<td>Dispensador plastico de sobremesa</td>"
                                        . "<td>".$dispenplasticoprecio."</td>"
                                        . "<td>".$totaldispenplastico."</td>"        
                                        . "</tr>";
                                    }
                                     if($llavecantidad > 0){
                                        $totalllave= $llaveprecio*$llavecantidad;
                                     
                                        echo "<tr>"
                                        . "<td>".$llavecantidad."</td>"
                                        . "<td>Llave de dispensador</td>"
                                        . "<td>".$llaveprecio."</td>"
                                        . "<td>".$totalllave."</td>"        
                                        . "</tr>";
                                    }
                                    $totalneto= $totalb20 + $totalb10 + $totaldispen + $totaldispenplastico + $totalllave;
                                    $iva = $totalneto*0.19;
                                    $resultado= round($iva,0)+$totalneto;
                                        echo "<tr>"
                                        . "<td rowspan='3'></td>"
                                        . "<td rowspan='3'>TOTAL </td>"
                                        . "<td>Total Neto</td>"
                                        . "<td>".$totalneto."</td>"
                                        . "</tr>";
                                        
                                        
                                        
                                        echo  "<tr>"
                                        . "<td>iva</td>"
                                        . "<td>".round($iva,0)."</td>"
                                        . "</tr>";                                        
                                        echo "<tr>"
                                        . "<td>Total</td>"
                                        . "<td>".$resultado."</td>"
                                        . "</tr>"

                                    
                                    ?>
			

			
				</table>
				</div>

			</div>
      			<br><br><br><br>
                        <div class="row">
				<div class="col-md-12 text-center">
				<br><br><br><br>
				<br><strong>Envasadora y Embotelladora Prana Ltda.</strong>
                                    <br>Giro: Purificadora de agua
				<br>Arza #560 / Fono: 228316842 
                                    <br> Melipilla - Region Metropolitana
				<br>Web: www.aguaprana.cl &nbsp;Mail:&nbsp;ventas@aguaprana.cl
				</div>
			</div>      
                        <br><br><br><br>
		</div>

	  </body>
</html>