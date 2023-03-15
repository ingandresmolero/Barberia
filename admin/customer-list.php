<?php
session_start();
error_reporting(0);
$id=$_SESSION['bpmsaid'];

include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{



?>
<!DOCTYPE HTML>
<html>
<head>
<title>Activo | Lista de Clientes</title>
<link rel="shortcut icon" href="../admin/images/icono.ico">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Lista de Clientes</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Lista de Clientes:</h4>
						<table class="table table-bordered"> <thead> <tr> <th>#</th> <th>Nombre de Cliente</th> <th>Número Móvil</th> <th>Fecha de Creación</th><th>Usuario</th><th>Acción</th> </tr> </thead> <tbody>
<?php
if($rol=='admin'){
	$ret=mysqli_query($con,"select tblcustomers.ID, tbladmin.AdminName as usuario ,tblcustomers.Name as nombre, tblcustomers.MobileNumber as telefono ,tblcustomers.CreationDate as fechacrea, tblcustomers.ID as idclien  from  tblcustomers inner join tbladmin on tblcustomers.assignedBy=tbladmin.ID  ");
	$cnt=1;


while ($row=mysqli_fetch_array($ret)) {

?>

								<tr> <th scope="row"><?php echo $cnt;?></th> 
								 <td><?php  echo $row['nombre'];?></td> 
								 <td><?php  echo $row['telefono'];?></td>
								 <td><?php  echo $row['fechacrea'];?></td> 
								 <td><?php  echo $row['usuario'];?></td> 
								 <td><a href="edit-customer-detailed.php?editid=<?php echo $row['idclien'];?>" class="button">Editar</a>  ||  <a href="add-customer-services.php?addid=<?php echo $row['ID'];?>" class="button">Asignar Servicio</a></td> </tr>   <?php
$cnt=$cnt+1;
}}else{
	if($rol!='admin'){
		$ret2=mysqli_query($con,"select tblcustomers.ID, tbladmin.AdminName as usuario ,tblcustomers.Name as nombre, tblcustomers.MobileNumber as telefono ,tblcustomers.CreationDate as fechacrea, tblcustomers.ID as idclien  from  tblcustomers inner join tbladmin on tblcustomers.assignedBy=tbladmin.ID where tblcustomers.assignedBy='$id'");
	$cnt2=1;

	while ($row2=mysqli_fetch_array($ret2)) {

		?>
		
								 <tr> <th scope="row2"><?php echo $cnt2;?></th> 
								 <td><?php  echo $row2['nombre'];?></td> 
								 <td><?php  echo $row2['telefono'];?></td>
								 <td><?php  echo $row2['fechacrea'];?></td> 
								 <td><?php  echo $row2['usuario'];?></td> 
								 <td><a href="edit-customer-detailed.php?editid=<?php echo $row2['idclien'];?>" class="button">Editar</a>  ||  <a href="add-customer-services.php?addid=<?php echo $row2['ID'];?>" class="button">Asignar Servicio</a></td> </tr>   <?php 
		$cnt2=$cnt2+1;
		}
	}
}

?></tbody> </table> 
					</div>
				</div>
			</div>
			<!--footer-->
			 <?php include_once('includes/footer.php');?>
			<!--//footer-->
		</div>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>