<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['name'];?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {border:1px solid; height: 88%; width: 91%; text-align:center;}
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style  type="text/css">
       
        button {
        background: cornflowerblue;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-family: 'Lato';
        margin: 5px;
        text-transform: uppercase;
        cursor: pointer;
        outline: none;
        }

        button:hover {
        background: orange;
        }
    </style>
    <script type="text/javascript">
    document.querySelector(".third").addEventListener("click", function() {
  Swal.fire({
    title: "Profile Picture",
    text: "Do you want to make the above image your profile picture?",
    imageUrl: "https://images3.imgbox.com/4f/e6/wOhuryw6_o.jpg",
    imageWidth: 550,
    imageHeight: 225,
    imageAlt: "Eagle Image",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    confirmButtonColor: "#00ff55",
    cancelButtonColor: "#999999",
    reverseButtons: true,
  });
});
</script>
</head>
<body>
  
<div class="container">
    <h1 class="text-center"><?php echo $_GET['name'];?></h1>
   
    <form method="POST" action="cp_clark_camera.php">
        <div class="row">
            <div class="col-md-6" style="text-align:center;">Connecting to camera, pls wait...
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <input type="hidden" name="id" value="3487">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <br><br>
            </div>
            <div class="col-md-6" style="text-align:center">
            <div id="results">Your photo will place here!</div>
            <button class="btn btn-success third">Submit</button>
            </div>
            <div class="col-md-12 text-center">
                
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            $(".id-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>