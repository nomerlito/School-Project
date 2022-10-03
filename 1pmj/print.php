<?php 
    $id = $_GET["id"];
	$name = $_GET["name"];
	$avatar = "default";
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
	<style>
		.image {
    display: block;
    width: 100%;
    height: auto;
  }
/* The overlay effect - lays on top of the container and over the image */
.idbutton{
	position: absolute;
}
.idprint {
    /*position: fixed;*/
	cursor: pointer;
    top: 0px;
	padding: 10px 24px;
    color: #f1f1f1;
	background-color: #4CAF50;
	border-radius: 8px;
    color: white;
    font-size: 20px;
	/*border: 1px solid #fff;*/
	text-align: center;
  }
  .idprint:hover{
	background-color: red;
  }
.idpic {
    position: absolute;
    top: 193px;

	padding: 0px 688px 0px 0px;
    color: #f1f1f1;
    width: 100%;
    color: black;
    font-size: 20px;
	/*border: 1px solid #fff;*/
	text-align: center;
	
  }
  .idname {
    position: absolute;
	height: 50px;
    top: 400px;
	left:160px;
    color: #f1f1f1;
    width: 25%;
    color: black;
	font-size:15px;
	display: flex;
	justify-content: center; /* align horizontal */
	align-items: center; /* align vertical */
	/*border: 1px solid #555;*/
	text-align: center;
	text-transform: uppercase;
	font-weight: bold;
	font-size-adjust: 0.58;
  }
.idqr {
    position: absolute;
    top: 455px;
	padding: 0px 573px 0px 0px;
    color: #f1f1f1;
    width: 100%;
    color: black;
    font-size: 20px;
	/*border: 1px solid #555;*/
	text-align: center;
	
  }
  .vestqr {
    position: absolute;
    top: 155px;
	left:800px;
    color: #f1f1f1;
    width: 30%;
    color: black;
    font-size: 25px;
	/*border: 1px solid #555;*/
	text-align: center;
	text-transform: uppercase;
	font-weight: bold;
  }
  @media print {
   #main {position:relative; padding:0; height:1px; overflow:visible;}
   #printarea {position:absolute; width:100%; top:0; padding:0; margin:-1px;}
}

	</style>
</head>
<body>
<div class="idbutton">
<button class="idprint" onClick="window.print()" title="Print">Print this ID</button>
<button class="idprint" onclick="history.back()" title="Print">Back to List</button>
</div>
<div id="printarea">
<img src="images/1pmjlayout.jpg" alt="" style="width:100%; border: 1px solid #555;">

	<div class="idpic">
	<img src="images/avatar/
	<?php 
	if (file_exists('images/avatar/'.$id.'.jpg')) {
		echo $id; 
		
	}else{
		echo $avatar;
	
	}
	?>.jpg" alt="" style="width:192px; height:192px; object-fit: cover; border-radius: 50%;" >
	</div>
	<div class="idname">
	<p><?php echo $name;?></p>
	</div>
    <div class="idqr">            
        <input id="text" type="hidden" value="http://1pmj.com/<?php echo $id;?>" style="Width:20%"/ onblur='generateBarCode();'> 
        <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=http://1pmj.com/checkpoint.php?id=<?php echo $id;?>" alt="" title="<?php echo $id;?>" width="120" height="120" />
		<p><?php echo $id;?></p>		
	</div>
	<div class="vestqr">            
        <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=http://1pmj.com/checkpoint.php?id=<?php echo $id;?>" alt="" title="<?php echo $id;?>" width="330" height="330" style="padding:20px;" />
		<p><?php echo $id;?><br>
		<?php echo $name;?></p>		
	</div>
</div>

	<!-- CDN jQuery Datatable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	<script>
	
	$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	});
    
	function generateBarCode() 
{
    var nric = $('#text').val();
    var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
    $('#barcode').attr('src', url);
}

</script>						


</body>
</html>
<!-- Script --->
