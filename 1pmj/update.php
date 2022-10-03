<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Record</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css"  media="screen,projection"/>
</head>
<body>
	


<?php
$nocode = $_GET['no'];
require_once './config/db-config.php';
require_once './controller/update-controller.php';
	$db = new DBController();
	$conn = $db->connect();
	//$dCtrl  =	new ProductsController($conn);
	//$products = $dCtrl->update();
	
	$sql = "SELECT * FROM profile WHERE no=$nocode";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                //echo "id: " . $row["id"]. " - Name: " . $row["sname"]. " " . $row["fname"]. "<br>";
				$no=$row["no"];
				$sname=$row["sname"];
				$fname=$row["fname"];
				$mobile=$row["mobile"];
				$email=$row["email"];
				$status=$row["status"];
                }
            }

            mysqli_close($conn);
           
        
	
//echo $products;
?>






<div>
    	<div class="container">
    		<form method="post" action="update_record.php">
    			<div class="content">
    	
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
					<div class="form-group">
							<label for="last_name">Surname</label>
							<input id="last_name" id="first_name" type="text" class="validate" name="sname" placeholder="Surname" value="<?php echo $sname?>" required>			
						</div>
						<div class="form-group">
							<label for="fname" class="control-label">First Name</label>
							<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname?>" required>			
						</div>
						<div class="form-group">
							<label for="mobile">Mobile</label>							
							<input type="text" id="input_text" data-length="11" name="mobile" placeholder="Mobile" value="<?php echo $mobile?>">							
						</div>	   	
						<div class="form-group">
							<label for="email" class="control-label">Email</label>							
							<input id="email" type="email" class="form-control"  id="email" name="email" placeholder="Email" value="<?php echo $email?>"required>							
						</div>	 
						<div class="form-group">
							<label class="control-label">Status</label>	
							<p>
							<label>
							<input class="with-gap" type="radio" name="status" value="Validated"<?php if($status=="Validated"){echo "checked";}?>/><span>Validated</span>
							</label>
							&nbsp;&nbsp;&nbsp;
							<label>
							<input class="with-gap" type="radio" name="status" value="Pending" <?php if($status!="Validated"){echo "checked";}?>/><span>Pending</span></td>
							</label>
							</p>
							<input type="hidden" name="no" value="<?php echo $nocode ?>">	
							
							
						</div>					
    				<div >
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" /><br><br>
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" onclick="history.back()" class="btn waves-effect waves-light" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>

	</body>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		 $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
	</script>
</html>