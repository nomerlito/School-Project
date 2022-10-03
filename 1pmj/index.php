<?php 

	require_once './config/db-config.php'; 
	require_once './controller/product-controller.php';
	$db = new DBController();
	$conn = $db->connect();
	$dCtrl  =	new ProductsController($conn);
	$products = $dCtrl->index();
	$avatar = "default"
?>

<!DOCTYPE html>
<html>
<head>
	<title>Datatable Implementation in PHP</title>
	<!-- Bootstrap 4 CSS  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css"  media="screen,projection"/>
</head>
<body>

	<div class="container mt-5">
		<div class="row">
        <div class="col-sm-12">
                        <h2><b>1ST PHILIPPINE MOTORCYCLE JAMBOREE</b></h2>
                    </div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                <div style="text-align: right;"><button type="button"class="btn btn-info">Add Account</button><br><br></div>
				<table class="table table-bordered table-hovered table-striped" id="productTable">
					<thead>
						<th> ID Number </th>
						<th> Name </th>
						<th> Mobile </th>
						<th> Email </th>
						<th> Status </th>
						<th> Actions </th>
					</thead>

					<tbody>

					<?php 

						foreach($products as $product) : ?>
					
							<tr>
								<td style="text-transform: uppercase;"> <?php echo $product['id']; ?> </td>
								<td> <?php 
								if (file_exists('images/avatar/'.$product['id'].'.jpg')) {
										echo "<img src='images/avatar/".$product['id'].".jpg' class='avatar'>".$product['fname'] . " " . $product['sname']; 
										
									}else{
										echo "<img src='images/avatar/".$avatar.".jpg' class='avatar'>".$product['fname'] . " " . $product['sname'];
									
									}
					
								?> </td>
								<td> <?php echo $product['mobile']; ?> </td>
								<td> <?php echo $product['email']; ?> </td>
								<td <?php 
										if ($product['status'] == "Validated"){echo "class='text-success'> Validated";}
										else{echo "class='text-danger'> Pending";}
								
									?> </td>
								<td> 
									<?php $name = $product['fname'] . " " . $product['sname'];?>
								<a href="cam.php?id=<?php echo $product['id'] . "&name=" .$name; ?>" class="photo" title="Take Photo" data-toggle="tooltip"><i class="material-icons">photo_camera</i></a>
                                <a href="print.php?id=<?php echo $product['id'] . "&name=" .$name;?>" class="qr" title="Print QR" data-toggle="tooltip"><i class="material-icons">qr_code_2</i></a>
                            <a href="update.php?no=<?php echo $product['no'];?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">edit</i></a>
                            <a href="delete_record.php?no=<?php echo $product['no'];?>&id=<?php echo $product['id'];?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete?')"><i class="material-icons">delete</i></a> </td>
							</tr>
							

						<?php endforeach; ?>	
					</tbody>	
				</table>
				
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- CDN jQuery Datatable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	<script>
	
	$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	});
	$(document).ready(function() {
    	$('#productTable').DataTable();
	});

</script>						


</body>
</html>
<!-- Script --->
